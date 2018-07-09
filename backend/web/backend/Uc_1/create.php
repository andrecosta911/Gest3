<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Uc_1 */

$this->title = Yii::t('app', 'Create Uc 1');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uc 1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
