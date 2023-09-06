<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */

$this->title = 'Profissional: ' .$model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profissional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['Atualizar', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['eletar', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirmar' => 'Certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Nome',
            'Conselho',
            'NumeroConselho',
            'Nascimento',
            'Status',
        ],
    ]) ?>

</div>
