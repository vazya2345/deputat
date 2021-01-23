<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeputatsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deputats-search card card-primary">
    <div class="card-header">
        Депутатни топиш
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <blockquote>
                  <p>Керакли депутатни исм-шарифи ёки округ номи оркали топишингиз мумкин.</p>
        </blockquote>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'okrug_id') ?>
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
