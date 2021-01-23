<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MurojatsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="murojats-search card card-primary">
    <div class="card-header">
        Мурожаатларни кидириш
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <blockquote>
                  <p>Керакли мурожаатни кирирув тизими оркали топишингиз мумкин</p>
                  <small>Мурожаат раками, исм-шарифингиз ёки депутат исм-шарифи буйича киришиш имконияти мавжуд.</small>
        </blockquote>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'id') ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'deputat_id') ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'murojatchi_name') ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="form-group">
            <?= Html::submitButton('Излаш', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Бекор килиш', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
        
    </div>
    

    

    <?php ActiveForm::end(); ?>

</div>
