<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */

$this->title = 'Atualizar Cadastro de: ' . $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="profissional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
