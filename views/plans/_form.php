<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Plans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plans-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'deputat_id')->textInput() ?>

    <?= $form->field($model, 'plan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'baj')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'baj_date')->textInput() ?>

    <?= $form->field($model, 'ocenka')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'mod_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
