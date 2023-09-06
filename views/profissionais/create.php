<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */

$this->title = 'Create Profissional';
$this->params['breadcrumbs'][] = ['label' => 'Profissionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
