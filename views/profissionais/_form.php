<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Conselho')->dropDownList([ 'CRM' => 'CRM', 'CRO' => 'CRO', 'CRN' => 'CRN', 'COREN' => 'COREN', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'NumeroConselho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nascimento')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'Ativo' => 'Ativo', 'Inativo' => 'Inativo', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
