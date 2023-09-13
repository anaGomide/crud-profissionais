<?php

namespace app\controllers;

use Yii;
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
    public function actionIndex()
{
    $modelProfissionalClinica = new ProfissionalClinica();

    $searchModel = new ProfissionalClinicaSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'modelProfissionalClinica' => $modelProfissionalClinica,
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
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'success' => true,
                ];
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
            return $this->redirect(['profissionais/view', 'ID' => $modelProfissionalClinica->profissional_id]);
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
        // Encontre o modelo a ser excluído
    $model = $this->findModel($id);

    // Salve a URL de retorno
    $returnUrl = Yii::$app->request->post('returnUrl');

    // Exclua o modelo
    $model->delete();

    // Redirecione de volta para a página anterior (a página "index" original ou outra página definida)
    if ($returnUrl !== null) {
        return $this->redirect(['profissionais/view', 'ID' => $model->profissional_id]);
    } else {
        return $this->redirect(['index']);
    }
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
