<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Murojats */

$this->title = 'Мурожаат юбориш';
$this->params['breadcrumbs'][] = ['label' => 'Мурожаатлар руйхати', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murojats-create card">
	<div class="card-body">
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>
