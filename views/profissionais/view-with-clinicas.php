<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

$this->title = 'Visualização com Clínicas Vinculadas: ' . $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!-- Exibir informações do profissional -->
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

    <h2>Clínicas Vinculadas:</h2>

    <!-- Exibir clínicas vinculadas em um GridView -->
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $clinicasVinculadas]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome', // Atributo da clínica que você deseja exibir
            // Outras colunas que desejar
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}', // Adicione outras ações conforme necessário
                'buttons' => [
                    'delete' => function ($url, $modelClinica, $key) use ($model) {
                        $url = ['desvincular-clinica', 'profissional_id' => $model->ID, 'clinica_id' => $modelClinica->ID];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Desvincular',
                            'data' => [
                                'confirm' => 'Tem certeza de que deseja desvincular esta clínica?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>