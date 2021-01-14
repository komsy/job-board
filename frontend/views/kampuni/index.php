<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KampuniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kampunis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kampuni-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kampuni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'companyId',
            'userId',
            'companyName',
            'country',
            'location',
            //'industry',
            //'website',
            //'telephone',
            //'companyImage',
            //'createdAt',
            //'updatedAt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
