<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = $model->nome . ' - Atualizar Dados';
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->idAluno]];
$this->params['breadcrumbs'][] = 'Atualizar Dados';
?>
<div class="aluno-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
