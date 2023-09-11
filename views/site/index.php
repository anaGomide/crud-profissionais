<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Bem-vindo à Aplicação de Gerenciamento de Profissionais de Saúde e Clínicas';
?>
<div class="site-index">
    <div class="jumbotron ">
        <h1><?= Html::encode($this->title) ?></h1>

        <h3 >Esta aplicação foi projetada para facilitar o gerenciamento de profissionais de saúde e clínicas médicas.</h3>

        <p>
            Você pode realizar diversas operações, incluindo a criação, leitura, atualização e exclusão de registros de profissionais de saúde e clínicas médicas.
        </p>

        <p><?= Html::a('Comece agora', ['site/login'], ['class' => 'btn btn-success']) ?></p>
    </div>

    <div class="body-content">
        <div class="row row justify-content-center">
            <div class="col-lg-4 mx-auto">
                <h2>Gerencie Profissionais de Saúde</h2>

                <p>Cadastre, atualize e consulte informações detalhadas sobre profissionais de saúde, incluindo seus nomes, registros em conselhos profissionais, datas de nascimento e status de atuação.</p>
            </div>
            <div class="col-lg-4 mx-auto">
                <h2>Registre Clínicas Médicas</h2>

                <p>Crie perfis de clínicas médicas, incluindo nome, CNPJ, endereço e outros detalhes relevantes. Mantenha um registro organizado de todas as clínicas associadas à sua aplicação.</p>
            </div>
            
        </div>
    </div>
</div>