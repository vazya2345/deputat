<?php

namespace app\controllers;

use Yii;
use app\models\Deputats;
use app\models\User;
use app\models\DeputatsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DeputatsController implements the CRUD actions for Deputats model.
 */
class DeputatsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','guestview'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view','grid','delete','update','create'],
                        'roles' => ['viewAdminPage'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['myview','index'],
                        'roles' => ['updateMurojats'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Deputats models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DeputatsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGrid()
    {
        $searchModel = new DeputatsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('grid', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deputats model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGuestview($id)
    {
        return $this->render('guestview', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Deputats model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Deputats();

        if ($model->load(Yii::$app->request->post())) {
            $model1 = User::find()->where(['username' => $model->username])->one();
            if (empty($model1)&&$model->password==$model->password2){
                $user = new User();
                $user->username = $model->username;
                $user->email = $model->username.'@deputat.uz';
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if($user->save()){
                    $model->user_id = $user->id;
                    $auth = \Yii::$app->authManager;
                    $authorRole = $auth->getRole('deputat');
                    $auth->assign($authorRole, $user->id);  
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->id]);    
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Deputats model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Deputats model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Deputats model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deputats the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deputats::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
