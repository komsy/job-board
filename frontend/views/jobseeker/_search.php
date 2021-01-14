<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JobseekerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobseeker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'seekId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'fullName') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'educationLevel') ?>

    <?php // echo $form->field($model, 'fieldOfStudy') ?>

    <?php // echo $form->field($model, 'careerObjective') ?>

    <?php // echo $form->field($model, 'newsSource') ?>

    <?php // echo $form->field($model, 'userImage') ?>

    <?php // echo $form->field($model, 'UploadCv') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
