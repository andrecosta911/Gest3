<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\docente\models\Docente;

/* @var $this yii\web\View */
/* @var $model backend\models\Aluno */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Alunos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$docente = Docente::findOne($model->tutor);
?>
<div class="aluno-view">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAluno',
            'nome',
            'data_nascimento',
            'email:email',
                [
                'label' => 'Tutor',
                'attribute' => 'docenteIdDocente.nome',
                'format' => 'raw',
                'value' => Html::a($text = $docente['nome'], $url = 'index.php?r=Docente%2Fdocente%2Fview&id=' . $model->tutor),
            ],
        ],
    ])
    ?>
    <p>
        <?= Html::a('Atualizar Dados', ['update', 'id' => $model->idAluno], ['class' => 'btn btn-default']) ?>
    </p>

</div>
