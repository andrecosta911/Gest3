<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AlunoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alunos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aluno-index">
    <br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Registar Novo Aluno', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-open-file"></i> Importar Lista de Alunos', ['create'], ['class' => 'btn btn-default']) ?>
    </p>
    <br>
    <?php
    $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
        'idAluno',
        'nome',
        'email:email',
            ['class' => 'kartik\grid\ActionColumn', 'template' => '{view}'],
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'summary' => "Resultados: {begin} - {end} de {totalCount}",
        'responsive' => true,
        'bootstrap' => true,
        'perfectScrollbar' => true,
        'hover' => true,
        'condensed' => false,
        'panel' => [
            'type' => 'default',
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-warning']),
            'footer' => false
        ],
    ]);
    ?>
</div>
