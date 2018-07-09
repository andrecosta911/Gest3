<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Uc_1 */

$this->title = Yii::t('app', 'Registar Unidade Curricular');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Curriculares (Nível 1)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-1-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
