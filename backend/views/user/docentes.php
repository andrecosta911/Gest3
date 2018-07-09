<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\userSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administradores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <br>
    <p>
        <?= Html::a('Registar Novo Administrador', ['create'], ['class' => 'btn btn-default']) ?>
    </p>
    <br>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Resultados: {begin} - {end} de {totalCount}",
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'nome',
            'username',
            'email:email',
            [
                'label' => 'Estado',
                'attribute' => 'estado'
            ],
            // 'Type',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete} {update}'],
        ],
    ]);
    ?>
</div>
