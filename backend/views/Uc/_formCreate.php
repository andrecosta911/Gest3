<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Uc;
use yii\helpers\ArrayHelper;
use backend\models\Uc_0;
use backend\models\Uc_1;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uc-0-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'uc_1')->dropDownList(
            ArrayHelper::map(Uc_1::find()->all(), 'idUc1', 'designacao'),
            [
                'prompt' => '',
                'onchange' => '$.post("index.php?r=uc_0/list&id='.'"+$(this).val(), function(data){$( "select#uc-uc_0").html(data);});'
                ]
    )->label('Unidade Curricular (Nível 1)')
    ?>
    
    <?=
    $form->field($model, 'uc_0')->dropDownList(
            ArrayHelper::map(Uc_0::find()->all(), 'idUc0', 'designacao'), ['prompt' => '']
    )->label('Unidade Curricular (Nível Zero)')
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Registar') : Yii::t('app', 'Confirmar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

