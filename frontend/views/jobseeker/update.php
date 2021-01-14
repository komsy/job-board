<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jobseeker */

$this->title = 'Update Jobseeker: ' . $model->seekId;
$this->params['breadcrumbs'][] = ['label' => 'Jobseekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seekId, 'url' => ['view', 'id' => $model->seekId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobseeker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
