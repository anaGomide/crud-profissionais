<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $clinicas app\models\ProfissionalClinica[] */
?>

<?php
Pjax::begin(['id' => 'index-clinicas']);

echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $clinicas]),
    'columns' => [
        'clinica.nome',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {

                return ['profissional-clinica/' . $action, 'id' => $model->id];
            },
        ],
    ],
]);
Pjax::end();
?>