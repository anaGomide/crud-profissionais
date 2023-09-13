<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // Importar a classe ArrayHelper
use app\models\Profissional; // Importar o modelo Profissional
use app\models\Clinica; //

/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinica $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissional-clinica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profissional_id')->dropDownList(
        ArrayHelper::map(Profissional::find()->all(), 'ID', 'Nome'),
        ['prompt' => 'Selecione um profissional']
    ) ?>

    <?= $form->field($model, 'clinica_id')->dropDownList(
        ArrayHelper::map(Clinica::find()->all(), 'id', 'nome'),
        ['prompt' => 'Selecione uma clínica']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
