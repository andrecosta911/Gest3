<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_0 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Uc 0',
]) . $model->idUc0;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uc 0s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUc0, 'url' => ['view', 'id' => $model->idUc0]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="uc-0-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
