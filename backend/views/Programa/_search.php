<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modelsProgramaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPrograma') ?>

    <?= $form->field($model, 'designacao') ?>

    <?= $form->field($model, 'duracao') ?>

    <?= $form->field($model, 'ECTS') ?>

    <?= $form->field($model, 'docente_idDocente') ?>

    <?php // echo $form->field($model, 'area_cientifica_idArea') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
