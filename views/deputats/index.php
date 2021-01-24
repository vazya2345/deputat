<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DeputatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Депутатлар руйхати';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deputats-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
        	$str = '<div class="card">
        				<div class="card-body">
        					<p>'.Html::a(Html::encode($model->name), ['guestview', 'id' => $model->id]).'</p>
        					'.Html::encode($model->desc).'
        				</div>
        			</div>
        	';
            return $str;
        },
    ]) ?>


</div>
