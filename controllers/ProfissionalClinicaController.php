<?php

namespace app\controllers;

use app\models\Clinica;
use app\models\Profissional;
use app\models\ProfissionalClinica;
use app\models\ProfissionalClinicaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfissionalClinicaController implements the CRUD actions for ProfissionalClinica model.
 */
class ProfissionalClinicaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ProfissionalClinica models.
     *
     * @return string
     */
    public function actionIndex($profissional_id)
{
    // Verifica se o ID do profissional é válido
    $modelProfissional = Profissional::findOne($profissional_id);
    
    if ($modelProfissional === null) {
        throw new NotFoundHttpException('Profissional não encontrado.');
    }

    $searchModel = new ProfissionalClinicaSearch();
    
    // Configura o filtro para listar apenas as clínicas relacionadas ao profissional
    $searchModel->profissional_id = $profissional_id;
    
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}

    /**
     * Displays a single ProfissionalClinica model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelProfissionalClinica = new ProfissionalClinica();
        $searchModel = new ProfissionalClinicaSearch();
        $searchModel = new ProfissionalClinicaSearch();
        $modelClinica = new Clinica();

        return $this->render('profissional-clinica-view', [
            'model' => $model,
            'modelProfissionalClinica' => $modelProfissionalClinica,
            'modelClinica' => $modelClinica,
        ]);
    }

    /**
     * Creates a new ProfissionalClinica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
{
    $modelProfissionalClinica = new ProfissionalClinica();

    if ($this->request->isPost) {
        if ($modelProfissionalClinica->load($this->request->post()) && $modelProfissionalClinica->save()) {
            // Após um salvamento bem-sucedido, obtenha as clínicas vinculadas ao profissional
            $clinicas = ProfissionalClinica::find()->where(['profissional_id' => $modelProfissionalClinica->profissional_id])->all();

            // Renderize a visão parcial _clinicas_section e retorne-a como uma resposta JSON
            return $this->asJson([
                'success' => true,
                'clinicas' => $this->renderPartial('_clinicas_section', ['clinicas' => $clinicas]),
            ]);
        }
    } else {
        $modelProfissionalClinica->loadDefaultValues();
    }

    return $this->render('create', [
        'modelProfissionalClinica' => $modelProfissionalClinica,
    ]);
}

    /**
     * Updates an existing ProfissionalClinica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $modelProfissionalClinica = $this->findModel($id);

        if ($this->request->isPost && $modelProfissionalClinica->load($this->request->post()) && $modelProfissionalClinica->save()) {
            return $this->redirect(['view', 'id' => $modelProfissionalClinica->id]);
        }

        return $this->render('update', [
            'model' => $modelProfissionalClinica,
        ]);
    }

    /**
     * Deletes an existing ProfissionalClinica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProfissionalClinica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProfissionalClinica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($modelProfissionalClinica = ProfissionalClinica::findOne(['id' => $id])) !== null) {
            return $modelProfissionalClinica;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetClinicas()
{
    $clinicas = Clinica::find()->all();
    return json_encode($clinicas);
}

}
