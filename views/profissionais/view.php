<?php

use app\models\Clinica;
use app\models\Profissional;
use app\models\ProfissionalClinica;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\views\profissionais\_clinicas_section;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */
/** @var app\models\ProfissionalClinica $model */
/** @var app\models\ProfissionalClinicaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profissional: ' . $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profissional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirmar' => 'Certeza que deseja excluir esse item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::button('Vincular clínica', ['class' => 'btn btn-primary', 'id' => 'openModalButton', 'data-profissional-id' => $model->ID]) ?>


        <?php
        Modal::begin([
            'title' => '<h2>Vincular à Clínica</h2>',
            'id' => 'profissionalClinicaModal',
        ]);
        ?>

    <div class="profissional-clinica-form">
        <?php $form = ActiveForm::begin(
            [
                'id' => 'clinica-form',
                'action' => ['profissional-clinica/create']
            ]
        ); ?>

        <?= $form->field($modelProfissionalClinica, 'profissional_id')->hiddenInput(['id' => 'profissionalclinicaprofissional-id'])->label(false) ?>

        <?= $form->field($modelProfissionalClinica, 'clinica_id')->dropDownList(
            ArrayHelper::map(Clinica::find()->all(), 'id', 'nome'),
            ['prompt' => 'Selecione uma clínica']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success', 'id' => 'saveClinicaButton']); ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?php Modal::end(); ?>

    <?php
    $this->registerJs("
    $(document).on('click', '#openModalButton', function() {
        var profissionalId = $(this).data('profissional-id');
        $('#profissionalClinicaModal').modal('show');
        $('#profissionalclinicaprofissional-id').val(profissionalId);
    });
    $(document).on('click', '#saveClinicaButton', function(e) {
        e.preventDefault(); // Evitar o comportamento padrão do botão
    
        var form = $('#clinica-form'); // Selecionar o formulário pelo ID
        var formData = form.serialize(); // Serializar o formulário
    
        // Enviar a solicitação Ajax para a ação de criação apropriada
        $.ajax({
            
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            success: function(data) {
                // Atualizar a seção de exibição das clínicas vinculadas com o novo HTML
                // $('#clinicas-section').html(data);
    
                // Fechar a modal após o envio bem-sucedido
                if (data.success == true){
                    $('#profissionalClinicaModal').modal('hide');

                    $.pjax.reload({container:'#index-clinicas',async:false});
                }
               
                window.location.reload();
            },
            
        });
    });
");
    ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Nome',
            'Conselho',
            'NumeroConselho',
            'Nascimento',
            'Status',
        ],
    ]) ?>

    

<div id="clinicas-section">
    <?= $this->render('_clinicas_section', ['clinicas' => $clinicas]) ?>
</div>




</div>