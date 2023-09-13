<?php

use app\models\ProfissionalClinica;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinicaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissional Clinicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-clinica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Profissional Clinica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
        [
            'attribute' => 'profissional_id', // Nome do atributo no modelo ProfissionalClinica
            'value' => function ($model) {
                return $model->profissional->Nome; // Acesse o atributo Nome do modelo Profissional através da relação
            },
            'label' => 'Profissional', // Rótulo da coluna
        ],
        
        [
            'attribute' => 'clinica_id', // Nome do atributo no modelo ProfissionalClinica
            'value' => function ($model) {
                return $model->clinica->nome; // Acesse o atributo nome do modelo Clinica através da relação
            },
            'label' => 'Clínica', // Rótulo da coluna
        ],
        
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, ProfissionalClinica $modelProfissionalClinica, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $modelProfissionalClinica->id]);
            },
        ],
    ],
]); ?>



</div>
