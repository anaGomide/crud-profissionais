<?php

use app\models\Profissional;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProfissionaisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-index">

<h1><?= Html::encode($this->title) ?></h1>

<div class="d-flex justify-content-between align-items-center">
    <p>
        <?= Html::a('Cadastrar Profissional', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Modal::begin([
        'title' => 'Hello world',
        'toggleButton' => [
            'label' => 'Clínicas',
            'class' => 'btn btn-primary',
        ],
    ]);?>

    <?= $this->render('_form', [
        'model' => new app\models\Clinica(), // Certifique-se de passar o modelo correto aqui
    ]) ?>

    <?php Modal::end(); ?>
</div>

<?php // echo $this->render('_search', ['model' => $searchModel]); 
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'ID',
        'Nome',
        'Conselho',
        'NumeroConselho',
        'Nascimento',
        'Status',
        //'Status',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Profissional $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ID' => $model->ID]);
            }
        ],
    ],
]); ?>

</div>