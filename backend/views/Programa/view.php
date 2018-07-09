<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\docente\models\Docente;

/* @var $this yii\web\View */
/* @var $model backend\models\Programa */

$this->title = $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Programas Doutorais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$docente = Docente::findOne($model->docente_idDocente);

?>
<div class="programa-view">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPrograma',
            'designacao',
            'duracao',
            'ECTS',
//            [
//                'label' => 'Diretor de Curso',
//                'attribute' => 'docenteIdDocente.nome',
//                
//            ],
            [
                'label' => 'Diretor de Curso',
                'attribute' => 'docenteIdDocente.nome',
                'format' => 'raw',
                'value' => Html::a($text = $docente['nome'], $url = 'index.php?r=Docente%2Fdocente%2Fview&id='.$model->docente_idDocente),
            ],
                [
                'label' => 'Área Científica',
                'attribute' => 'areaCientificaIdArea.designacao',
            ],
        ],
    ])
    ?>

    <p>
        <?= Html::a('Atualizar Dados', ['update', 'id' => $model->idPrograma], ['class' => 'btn btn-default']) ?>
        <?php
//        Html::a('Delete', ['delete', 'id' => $model->idPrograma], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ])
//        
        ?>
    </p>

</div>
