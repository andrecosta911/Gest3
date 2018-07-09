<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AlunoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idAluno') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'data_nascimento') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'tutor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
