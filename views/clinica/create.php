<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Clinica $model */

$this->title = 'Create Clinica';
$this->params['breadcrumbs'][] = ['label' => 'Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
