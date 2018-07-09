<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Uc_0Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Unidades Curriculares');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-0-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <br>
    <p>
    <h2><?= Html::encode($this->title) ?></h2>
    </p>
    <br>
    <br>
    <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i> Registar Nova Unidade Curricular'), ['create'], ['class' => 'btn btn-default']) ?>
    </p>
</div