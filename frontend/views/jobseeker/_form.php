<?php

use yii\helpers\Html;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use frontend\models\Media;
//use yii\bootstrap4\Dropdown;
//use yii\bootstrap4\Widget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jobseeker */
/* @var $form yii\widgets\ActiveForm */

$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();
$list = ArrayHelper::map(media::find()->all(), 'mediaId', 'source'); //map all data in gender and select gender id and gender name

?>

<div class="container">
<div class="jobseeker-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'] ]); ?>

    <?= $form->field($model, 'userId')->hiddenInput(['value' => $userId->id, 'readonly'=>true])->label(false) ?>
    
    <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'educationLevel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fieldOfStudy')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'newsSource')->textInput()->dropDownList($list, ['placeholder'=>'Select source']) ?>

    <?= $form->field($model, 'careerObjective')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'UploadCv')->fileInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'userImage')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
