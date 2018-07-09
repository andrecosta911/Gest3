<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\docente\models\Docente */

$this->title = 'Registar Novo Docente';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
