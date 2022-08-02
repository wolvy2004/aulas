<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'ubicacion') ?>

    <?= $form->field($model, 'cant_pcs') ?>

    <?= $form->field($model, 'es_climatizada')->checkbox() ?>

    <?php // echo $form->field($model, 'aforo')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
