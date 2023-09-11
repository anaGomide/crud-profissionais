<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinica $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissional-clinica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'profissional_id')->textInput() ?>

    <?= $form->field($model, 'clinica_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
