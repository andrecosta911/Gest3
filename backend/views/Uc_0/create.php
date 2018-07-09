<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Uc_0 */

$this->title = Yii::t('app', 'Registar Unidade Curricular');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Curriculares (Nível Zero)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-0-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
