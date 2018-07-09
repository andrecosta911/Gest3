<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Programa */

$this->title = $model->designacao.' - Atualizar Dados';
$this->params['breadcrumbs'][] = ['label' => 'Programas Doutorais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->designacao, 'url' => ['view', 'id' => $model->idPrograma]];
$this->params['breadcrumbs'][] = 'Atualizar Dados';
?>
<div class="programa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
