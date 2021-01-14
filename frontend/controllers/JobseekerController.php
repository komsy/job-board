<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Jobseeker;
use frontend\models\JobseekerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JobseekerController implements the CRUD actions for Jobseeker model.
 */
class JobseekerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jobseeker models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobseekerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jobseeker model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jobseeker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jobseeker();

        if ($model->load(Yii::$app->request->post())) {

         //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->userImage = UploadedFile::getInstance($model, 'userImage');
        //saves file in the root directory
         $model->userImage->saveAs('uploads/'.$imageName.'.'.$model->userImage->extension);
            //save in the db
         $model->userImage ='uploads/'.$imageName.'.'.$model->userImage->extension;

        //generates file with unique names
        $fileName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->UploadCv = UploadedFile::getInstance($model, 'UploadCv');
        //saves file in the root directory
         $model->UploadCv->saveAs('uploads/'.$fileName.'.'.$model->UploadCv->extension);
            //save in the db
         $model->UploadCv =$imageName.'.'.$model->UploadCv->extension;
         
         $model->save();
            return $this->redirect(['view', 'id' => $model->seekId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jobseeker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->seekId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jobseeker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jobseeker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jobseeker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jobseeker::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
