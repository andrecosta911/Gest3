<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\docente\models\Docente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->estado === 10 ? $estado = 'Ativo' : $estado = 'Inativo';
?>
<div class="docente-view">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                'label' => 'Número de Docente',
                'attribute' => 'idDocente',
            ],
            'nome',
            'email:email',
            //'username',
            [
                'label' => 'Criado em',
                'attribute' => 'criado_em'
            ],
            [
                'label' => 'Atualizado em',
                'attribute' => 'atualizado_em'
            ],
            //'estado',
            [
                'label' => 'Estado',
                'value' => $estado,
            ],
                [
                'label' => 'Área Científica',
                'attribute' => 'areaCientificaIdArea.designacao',
            ],
        ],
    ])
    ?>

    <p>
        <?= Html::a('Atualizar Dados', ['update', 'id' => $model->idDocente], ['class' => 'btn btn-default']) ?>
        <?php
//        Html::a('Delete', ['delete', 'id' => $model->idDocente], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ])
        ?>
    </p>

</div>
