<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Deputats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deputats-form card">
<div class="card-body">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-primary">
        <div class="card-header">Рухсат маълумотлари</div>
        <div class="card-body">
            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password2')->passwordInput() ?>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">Депутат маълумотлари</div>
        <div class="card-body">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'okrug_id')->dropDownList([1=>'Тошкент', 60=>'Андижон']) ?>

            <?= $form->field($model, 'info1')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'add_info')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Саклаш', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
