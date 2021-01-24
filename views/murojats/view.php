<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Deputats;
use app\models\Murojats;
/* @var $this yii\web\View */
/* @var $model app\models\Murojats */

$this->title = $model->murojatchi_name;
$this->params['breadcrumbs'][] = ['label' => 'Мурожаатлар руйхати', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="murojats-view card">
    <div class="card-body">
<?php
    if(\Yii::$app->user->can('viewAdminPage')){
?>
    <p>
        <?= Html::a('Узгартириш', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<?php
    }
?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'deputat_id'=>[
                'attribute'=>'deputat_id',
                'value'=>function($model){
                    return Deputats::getName($model->deputat_id);
                }
            ],
            'murojatchi_name',
            'murojatchi_contact',
            'murojat_text:ntext',
            'javob:ntext',
            'status'=>[
                'attribute'=>'status',
                'value'=>function($model){
                    return Murojats::getStatusName($model->status);
                }
            ],
            'create_date',
            'mod_date',
        ],
    ]) ?>
</div>
</div>
