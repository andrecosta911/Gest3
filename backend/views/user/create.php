<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = 'Registar Novo Administrador';
$this->params['breadcrumbs'][] = ['label' => 'Administradores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
