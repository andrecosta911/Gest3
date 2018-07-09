<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\docente\models\AreaCientifica;
use backend\modules\docente\models\Docente;

/* @var $this yii\web\View */
/* @var $model backend\models\Programa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPrograma')->textInput() ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracao')->textInput()->label('Duração (Semestres)') ?>

    <?= $form->field($model, 'ECTS')->textInput()->label('Número de ECTS') ?>

    <?=
    $form->field($model, 'area_cientifica_idArea')->dropDownList(
            ArrayHelper::map(AreaCientifica::find()->all(), 'idArea', 'designacao'), ['prompt' => '']
    )
    ?>

    <?=
    $form->field($model, 'docente_idDocente')->dropDownList(
            ArrayHelper::map(Docente::find()->all(), 'idDocente', 'nome'), ['prompt' => '']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registar' : 'Confirmar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
