<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $clinicas app\models\ProfissionalClinica[] */
?>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $clinicas]),
    'columns' => [
        'clinica.nome',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                // Defina as URLs das ações (update, delete) conforme necessário
                return ['profissional-clinica/' . $action, 'id' => $model->id];
            },
        ],
    ],
]) ?>