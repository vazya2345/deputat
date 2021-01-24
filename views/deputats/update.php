<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deputats */

$this->title = 'Узгартириш';
$this->params['breadcrumbs'][] = ['label' => 'Депутатлар руйхати', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Узгартириш';
?>
<div class="deputats-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
