<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = $model->nome . ' - Atualizar Dados';
$this->params['breadcrumbs'][] = ['label' => 'Administradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome];
$this->params['breadcrumbs'][] = 'Atualizar Dados';
?>
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
