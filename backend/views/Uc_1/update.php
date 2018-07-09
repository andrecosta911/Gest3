<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_1 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Uc 1',
]) . $model->idUc1;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uc 1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUc1, 'url' => ['view', 'id' => $model->idUc1]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="uc-1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
