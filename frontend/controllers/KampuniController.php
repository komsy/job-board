<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Kampuni;
use frontend\models\Addjob;
use frontend\models\KampuniSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KampuniController implements the CRUD actions for Kampuni model.
 */
class KampuniController extends Controller
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
     * Lists all Kampuni models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KampuniSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kampuni model.
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

    public function actionProfile()
        {
            return $this->render('profile');
        }
    
    public function actionListing()
        {
            return $this->render('listing');
        }
    
    public function actionApp()
        {
            return $this->render('app');
        }

    public function actionApplyjob($company, $jobId)
    {
        $model = new \frontend\models\Apply();
        
        if ($model->load(Yii::$app->request->post())) {
            
           $model->save();
            return $this->redirect(['kampuni/listing']);
        }

        return $this->renderAjax('applyjob', [
            'model' => $model,
            'companyId' =>$company,
            'jobId' => $jobId,
        ]);
    }
     
    public function actionViewjob($id, $companyId)
    {
        $product = Addjob::findOne($id);
        return $this->render('viewjob', 
            ['products'=>$product,
            'id' => $id,
            'companyId' =>$companyId,

        ]);

    }

     /**   
     * Creates a new Kampuni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
         $model = new Kampuni();

        if ($model->load(Yii::$app->request->post())) 
        {
            //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->companyImage = UploadedFile::getInstance($model, 'companyImage');
        //saves file in the root directory
         $model->companyImage->saveAs('uploads/'.$imageName.'.'.$model->companyImage->extension);
            //save in the db
         $model->companyImage ='uploads/'.$imageName.'.'.$model->companyImage->extension;
         $model->save();
        
            return $this->redirect(['view', 'id' => $model->companyId]);
          
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionAddjob()
        {
          //  $content = new \frontend\models\Junction();
       
            $model = new \frontend\models\Addjob();

            if ($model->load(Yii::$app->request->post())) 
            {
                 $model->save();
            //     $content->save();

                return $this->redirect(['profile', 'id' => $model->company]);
            
        }
            return $this->render('addjob', [
                'model' => $model,
            ]);
        }
    /**
     * Updates an existing Kampuni model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->companyId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kampuni model.
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
     * Finds the Kampuni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kampuni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kampuni::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
