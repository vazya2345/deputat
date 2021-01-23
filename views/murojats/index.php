<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MurojatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мурожаатлар руйхати';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murojats-index">



    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Янги мурожаат юбориш', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>


</div>
