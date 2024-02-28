<?php

namespace frontend\controllers;

use common\models\Alat;
use app\models\AlatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;


/**
 * AlatController implements the CRUD actions for Alat model.
 */
class AlatController extends Controller
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
     * Lists all Alat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AlatSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alat model.
     * @param int $id_alat Id Alat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_alat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_alat),
        ]);
    }

    /**
     * Creates a new Alat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
   //create upload foto
    public function actionCreate()
    {
        $model = new Alat();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->save()) {
                $model->foto->saveAs('uploads/' . $model->id_alat . '.' . $model->foto->extension);
                return $this->redirect(['view', 'id_alat' => $model->id_alat]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_alat Id Alat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    //update file foto
    public function actionUpdate($id_alat)
    {
        $model = $this->findModel($id_alat);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->foto = UploadedFile::getInstance($model, 'foto');
            if ($model->save()) {
                $model->foto->saveAs('uploads/' . $model->id_alat . '.' . $model->foto->extension);
                return $this->redirect(['view', 'id_alat' => $model->id_alat]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_alat Id Alat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_alat)
    {
        $this->findModel($id_alat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_alat Id Alat
     * @return Alat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_alat)
    {
        if (($model = Alat::findOne(['id_alat' => $id_alat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //create pdf
    public function actionPdf($id_alat)
    {
        $model = $this->findModel($id_alat);
        $content = $this->renderPartial('_pdf', [
            'model' => $model,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'options' => [
                'title' => 'Cetak Alat',
            ],
            'methods' => [
                'SetHeader' => ['Cetak Alat'],
                'SetFooter' => ['{PAGENO}'],
            ],
        ]);

        return $pdf->render();
    }
}
