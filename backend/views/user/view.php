<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = $model->idUser;
$this->params['breadcrumbs'][] = ['label' => 'Administradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <br>
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idUser], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar este utilizador?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUser',
            'username',
            'password_hash',
            'email:email',
            'estado',
            'tipo',
        ],
    ]) ?>

</div>
