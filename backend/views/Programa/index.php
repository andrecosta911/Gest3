<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modelsProgramaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programas Doutorais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-index">
    <br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Registar Novo Programa', ['create'], ['class' => 'btn btn-default']) ?>
    </p>
    <br>
    <?php
    $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
        'idPrograma',
        'designacao',
        'duracao',
        'ECTS',
            ['class' => 'kartik\grid\ActionColumn', 'template' => '{view}'],
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'export' => false,
        'toggleData' => true,
        'summary' => "Resultados: {begin} - {end} de {totalCount}",
        'responsive' => true,
        'bootstrap' => true,
        'perfectScrollbar' => true,
        'hover' => true,
        'condensed' => false,
        'panel' => [
            'type' => 'default',
            'footer' => false
        ],
    ]);
    ?>
</div>
