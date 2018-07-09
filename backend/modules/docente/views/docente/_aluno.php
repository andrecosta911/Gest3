<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use backend\models\Aluno;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */
?>

<?=

//$aluno = Aluno::findBySql('SELECT * FROM aluno WHERE tutor = '.  $searchModel->idDocente)->all();
//echo $aluno[0]['nome'];
//die();

GridView::widget([
    'summary' => "",
    'dataProvider' => $dataProvider,
    //'filterModel' => $model,
    'columns' => [
        //'nome',
        'idAluno',
            [
            'attribute' => 'nome',
            'label' => 'Nome',
            'contentOptions' => array('style' => 'overflow: auto; white-space: pre-line;'),
            'format' => 'raw',
            'value' => function($model) {
                return Html::a($text = $model->nome, $url = 'index.php?r=aluno/view&id=' . $model->idAluno);
            },
        ],
    ]
]);
?>