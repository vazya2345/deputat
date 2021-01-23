<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Deputats;
 


/* @var $this yii\web\View */
/* @var $model app\models\Murojats */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="murojats-form">

    <?php $form = ActiveForm::begin(); ?>

<?php    // Usage with ActiveForm and model
echo $form->field($model, 'deputat_id')->widget(Select2::classname(), [
    'data' => Deputats::getAll(),
    'options' => ['placeholder' => 'Депутат исм-шарифини киритинг...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

    <?= $form->field($model, 'murojatchi_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'murojatchi_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'murojat_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Мурожаатни юбориш', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
