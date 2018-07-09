<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\docente\models\Docente */

$this->title = $model->nome.' - Atualizar Dados';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->idDocente]];
$this->params['breadcrumbs'][] = 'Atualizar Dados';
?>
<div class="docente-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
