<?php

namespace app\controllers;
use app\models\Profissional;
use Yii;
use app\models\ProfissionalClinica;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
?>

<?php 

class VincularController extends Controller{

    public function actionViewWithClinicas($ID)
    {
        $modelVincular = $this->findModel($ID);
        $clinicasVinculadas = $modelVincular->clinicas;

        return $this->render('view-with-clinicas', [
            'model' => $modelVincular,
            'clinicasVinculadas' => $clinicasVinculadas,
        ]);
    }

    public function actionVincularClinica($ID)
{
    // Find the Profissional model by ID
    $profissional = $this->findModel($ID);

    // Create a new instance of ProfissionalClinica
    $modelVincular = new ProfissionalClinica();
    $modelVincular->profissional_id = $ID;

    if ($modelVincular->load(Yii::$app->request->post()) && $modelVincular->save()) {
        Yii::$app->session->setFlash('success', 'Profissional vinculado com sucesso a uma clínica.');
    } else {
        Yii::$app->session->setFlash('error', 'Erro ao vincular o profissional à clínica.');
    }

    return $this->render('/profissionais/_vincular-clinica-modal', [
        'model' => $modelVincular,
    ]);
}



}


?>