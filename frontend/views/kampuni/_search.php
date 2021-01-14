<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KampuniSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kampuni-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'companyId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'companyName') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'industry') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'companyImage') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
