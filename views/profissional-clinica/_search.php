<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinicaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissional-clinica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($modelProfissionalClinica, 'id') ?>

    <?= $form->field($modelProfissionalClinica, 'profissional_id') ?>

    <?= $form->field($modelProfissionalClinica, 'clinica_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
