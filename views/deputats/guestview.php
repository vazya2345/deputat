<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\Deputats;
/* @var $this yii\web\View */
/* @var $model app\models\Deputats */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Депутатлар руйхати', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="deputats-view card">
<div class="card-body">
    <p>
        <?= Html::a('Мурожаат йуллаш', ['murojats/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'okrug_id'=>[
                'attribute'=>'okrug_id',
                'value'=>function($model){
                    return Deputats::getOkrugNameByOkrugid($model->okrug_id);
                }
            ],
            'info1',
            'desc:ntext',
            'add_info',
        ],
    ]) ?>
</div>
</div>
