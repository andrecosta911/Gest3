<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\docente\models\DocenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Registar Novo Docente', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-open-file"></i> Importar Lista de Docentes', ['#'], ['class' => 'btn btn-default']) ?>
    </p>
    <br>
    <?=
     GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Resultados: {begin} - {end} de {totalCount}",
        'columns' => [
                [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new backend\modules\docente\models\DocenteSearch();
                    $searchModel->idDocente = $model->idDocente;
                    $dataProvider = $searchModel->studentSearch(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_aluno', [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider
                    ]);
                }
            ],
            'idDocente',
            'nome',
            'email:email',
                [
                'attribute' => 'area_cientifica_idArea',
                'value' => 'areaCientificaIdArea.designacao',
                'label' => 'Área Científica',
            ],
            // 'genero',
            // 'criado_em',
            // 'atualizado_em',
            // 'status',
            //'area_cientifica_idArea',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ]
    ]);
    ?>
</div>
