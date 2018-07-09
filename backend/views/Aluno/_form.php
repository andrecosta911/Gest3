<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\docente\models\Docente;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aluno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idAluno')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'data_nascimento')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]);
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'genero')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino',], ['prompt' => '']);
    }
    ?>

    <?=
    $form->field($model, 'tutor')->dropDownList(
            ArrayHelper::map(Docente::find()->all(), 'idDocente', 'nome'), ['prompt' => '']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registar' : 'Confirmar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
