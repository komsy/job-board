<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jobseeker */

$this->title = $model->seekId;
$this->params['breadcrumbs'][] = ['label' => 'Jobseekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jobseeker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->seekId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->seekId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'seekId',
            'userId',
            'fullName',
            'age',
            'educationLevel',
            'fieldOfStudy',
            'careerObjective:ntext',
            'newsSource',
            'userImage',
            'UploadCv',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
