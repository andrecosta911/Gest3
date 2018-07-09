<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\modules\docente\models\AreaCientifica;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\docente\models\Docente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($model->isNewRecord) {
        echo$form->field($model, 'idDocente')->textInput();
    }
    ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'genero')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino',], ['prompt' => '']);
    }
    ?>

    <?=
    $form->field($model, 'area_cientifica_idArea')->dropDownList(
            ArrayHelper::map(AreaCientifica::find()->all(), 'idArea', 'designacao'), ['prompt' => '']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registar' : 'Confirmar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
