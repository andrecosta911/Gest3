<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_1 */

$this->title = $model->designacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Curriculares (Nível 1)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-1-view">
    <br>
    <h2><?= Html::encode($this->title) ?></h2>
    <br>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                'label' => 'Código da Unidade Curricular',
                'attribute' => 'idUc1',
            ],
            'designacao',
                [
                'label' => 'Área Científica',
                'attribute' => 'areaCientificaIdArea.designacao',
            ],
        ],
    ])
    ?>


    <p>
        <?php // Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idUc1], ['class' => 'btn btn-primary'])  ?>
    </p>

</div>
