<?php

use app\models\Profissional;
use app\models\Clinica;
use app\models\ProfissionalClinica;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProfissionaisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissionais';
$this->params['breadcrumbs'][] = $this->title;

$clinicaModel = new Clinica();
$modelVincular = new ProfissionalClinica();


?>
<div class="profissional-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-between align-items-center">
        <p>
            <?= Html::a('Cadastrar Profissional', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php
        Modal::begin([
            'title' => 'Cadastrar Clínica',
            'toggleButton' => [
                'label' => 'Clínicas',
                'class' => 'btn btn-primary',
            ],
        ]);
        ?>

        <?php $form = ActiveForm::begin([
            'action' => ['clinica/create'], // Defina a ação correta para salvar a clínica
        ]); ?>

        <?= $form->field($clinicaModel, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($clinicaModel, 'cnpj')->textInput(['maxlength' => true]) ?>

        <?= $form->field($clinicaModel, 'endereco')->textInput(['maxlength' => true]) ?>


        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <?php Modal::end(); ?>

        

    </div>



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