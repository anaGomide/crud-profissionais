<?php
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use app\models\Clinica;
use app\models\ProfissionalClinica;

/* @var $this yii\web\View */
/* @var $modelVincular app\models\ProfissionalClinica */

Modal::begin([
    'id' => 'vincular-clinica-modal',
    'title' => '<h2>Vincular Clínica ao Profissional</h2>',
    'toggleButton' => [
        'label' => 'Vincular Clínica',
        'class' => 'btn btn-success',
    ],
]);

$form = ActiveForm::begin([
    'action' => ['vincular-clinica', 'ID' => $model->ID], // Ajuste a ação conforme necessário
]);

//$clinicas = Clinica::find()->all();

echo $form->field($model, 'clinica_id')->dropDownList(
    \yii\helpers\ArrayHelper::map($clinicas, 'id', 'nome'),
    ['prompt' => 'Selecione uma clínica']
);

echo Html::submitButton('Vincular', ['class' => 'btn btn-primary']);

ActiveForm::end();

Modal::end();
?>