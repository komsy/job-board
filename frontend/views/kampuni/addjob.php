<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use frontend\models\Kampuni;

/* @var $this yii\web\View */
/* @var $model frontend\models\Addjob */
/* @var $form ActiveForm */

$list = ArrayHelper::map(kampuni::find()->where(['userId'=>Yii::$app->user->id])->all(), 'companyId', 'companyName'); //map all data in company and select company id and company name

?>
<div class="container">
<div class="addjob">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'company')->textInput()->dropDownList($list, ['placeholder'=>'Select Company Name']) ?>
        <?= $form->field($model, 'companySize') ?>
        <?= $form->field($model, 'positionName') ?>
        <?= $form->field($model, 'salaryRange') ?>
        <?= $form->field($model, 'requirements') ?>
        <?= $form->field($model, 'responsibilities') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addjob -->
