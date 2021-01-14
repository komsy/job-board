<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jobseeker */

$this->title = 'Create Jobseeker';
$this->params['breadcrumbs'][] = ['label' => 'Jobseekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobseeker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
