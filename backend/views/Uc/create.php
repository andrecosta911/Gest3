<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_0 */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Curriculares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-0-view">
    <h2><?= Html::encode($this->title) ?></h2>
    <br>
    <?=
    $this->render('_formCreate', [
        'model' => $model,
    ])
    ?>
</div>
