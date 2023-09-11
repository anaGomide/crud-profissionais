<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinica $model */

$this->title = 'Update Profissional Clinica: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profissional Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profissional-clinica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
