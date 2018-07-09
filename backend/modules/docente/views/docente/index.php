<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\modules\docente\models\AreaCientifica;

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
    <?php Pjax::begin(); ?>    
    <?php
    $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            ['class' => 'kartik\grid\ExpandRowColumn',
            'expandTitle' => 'Ver Alunos',
            'expandAllTitle' => 'Ver Todos os Alunos',
            'collapseTitle' => '',
            'collapseAllTitle' => '',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new backend\modules\docente\models\DocenteSearch();
                $searchModel->idDocente = $model->idDocente;
                $dataProvider = $searchModel->studentSearch(Yii::$app->request->queryParams);

                return Yii::$app->controller->renderPartial('_aluno', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'model' => $model
                ]);
            }
        ],
        'idDocente',
        'nome',
        'email:email',
            [
            'attribute' => 'area_cientifica_idArea',
            'vAlign' => 'middle',
            'width' => '180px',
            'value' => 'areaCientificaIdArea.designacao',
            'label' => 'Área Científica',
//            'value' => function ($model, $key, $index, $widget) {
//                return Html::a($model->, '#', ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
//            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(AreaCientifica::find()->orderBy('designacao')->asArray()->all(), 'designacao', 'designacao'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => ''],
            'format' => 'raw'
        ],
            [
            'class' => 'kartik\grid\ActionColumn', 'template' => '{view}',
        ],
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
    <?php Pjax::end(); ?>
</div>
