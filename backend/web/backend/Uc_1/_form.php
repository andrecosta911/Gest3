<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uc-1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUc1')->textInput() ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_cientifica_idArea')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
