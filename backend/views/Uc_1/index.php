<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use backend\modules\docente\models\AreaCientifica;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Uc_1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Unidades Curriculares (Nível 1)');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-1-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <br>
    <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i> Registar Nova Unidade Curricular'), ['create'], ['class' => 'btn btn-default']) ?>
    </p>
    <br>
    <?php Pjax::begin(); ?>    
    <?php
    $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            [
            'label' => 'Código da Unidade Curricular',
            'attribute' => 'idUc1'
        ],
        'designacao',
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
            ['class' => 'kartik\grid\ActionColumn',
            'template' => '{view}',
        ],
    ];



    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        //'export' => false,
        'toggleData' => true,
        'summary' => "Resultados: {begin} - {end} de {totalCount}",
        'responsive' => true,
        'bootstrap' => true,
        'perfectScrollbar' => true,
        'hover' => true,
        'condensed' => false,
        'panel' => [
            'type' => 'default',
            'heading' => 'Unidades Curriculares (Nível 1)',
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['index'], ['class' => 'btn btn-warning']),
            'footer' => false
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
