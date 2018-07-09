<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\docente\models\DocenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDocente') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'criado_em') ?>

    <?php // echo $form->field($model, 'atualizado_em') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'area_cientifica_idArea') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
