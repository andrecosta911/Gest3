<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Programa */

$this->title = 'Registar Programa Doutoral';
$this->params['breadcrumbs'][] = ['label' => 'Programas Doutorais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
