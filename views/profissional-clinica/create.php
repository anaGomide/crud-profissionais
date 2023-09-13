<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProfissionalClinica $model */

$this->title = 'Create Profissional Clinica';
$this->params['breadcrumbs'][] = ['label' => 'Profissional Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-clinica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $modelProfissionalClinica,
    ]) ?>

</div>
