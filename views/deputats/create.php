<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deputats */

$this->title = 'Янги депутат кушиш';
$this->params['breadcrumbs'][] = ['label' => 'Депутатлар руйхати', 'url' => ['grid']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deputats-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
