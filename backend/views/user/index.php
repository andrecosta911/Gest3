<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\userSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Registar Novo Administrador', ['create'], ['class' => 'btn btn-default']) ?>
        <?php
//        Html::button('<i class="glyphicon glyphicon-plus"></i> Registar Novo Administrador', [
//            'value' => Url::to(['user/create']),
//            'class' => 'showModalButton btn btn-default',
//            'id' => 'modalButton_create_user'
//        ])
        ?>
    </p>
    <?php
//    Modal::begin([
//        'header' => '<h4>Registar Novo Administrador</h4>',
//        'id' => 'modal_user',
//        'size' => 'modal-lg',
//    ]);
//
//    echo "<div id='modalContent_user'></div>";
//
//    Modal::end();
    ?>
    <br>
    <?php
    $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
        'nome',
        'username',
        'email:email',
            [
            'class' => 'kartik\grid\ActionColumn', 'template' => '{delete}',
        ],
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'export' => false,
        'toggleData' => false,
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
