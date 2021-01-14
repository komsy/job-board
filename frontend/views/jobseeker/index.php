<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JobseekerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobseekers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobseeker-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jobseeker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'seekId',
            'userId',
            'fullName',
            'age',
            'educationLevel',
            //'fieldOfStudy',
            //'careerObjective:ntext',
            //'newsSource',
            //'userImage',
            //'UploadCv',
            //'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
