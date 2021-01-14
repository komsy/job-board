<?php

use yii\helpers\Html;
use common\models\User;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Company */
/* @var $form yii\bootstrap4\ActiveForm */

$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();

?>
<div class="container">
<div class="kampuni-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]); ?>

    <?= $form->field($model, 'userId')->hiddenInput(['value' => $userId->id, 'readonly'=>true])->label(false) ?>

    <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industry')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companyImage')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
