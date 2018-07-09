<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Uc_0 */

$this->title = $model->designacao;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidades Curriculares (Nível Zero)'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uc-0-view">
    <br>
    <h2><?= Html::encode($this->title) ?></h2>
    <br>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Código da Unidade Curricular',
                'attribute' => 'idUc0',
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
        <?php // Html::a(Yii::t('app', 'Atualizar Dados'), ['update', 'id' => $model->idUc0], ['class' => 'btn btn-default']) ?>
    </p>

</div>
