<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\docente\models\AreaCientifica;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_0 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uc-0-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUc0')->textInput()->label('Código da Unidade Curricular') ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'area_cientifica_idArea')->dropDownList(
            ArrayHelper::map(AreaCientifica::find()->all(), 'idArea', 'designacao'), ['prompt' => '']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registar') : Yii::t('app', 'Confirmar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
