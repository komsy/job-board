<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use frontend\models\Addjob;
use common\models\User;
use yii\bootstrap4\ActiveForm;
use frontend\models\Apply;
use frontend\models\Kampuni;
use frontend\models\Jobseeker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Apply */
/* @var $form ActiveForm */

$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();
$seekId = Jobseeker::find()->one();
$jobId = Addjob::find()->one();
?>
<div class="container">
<div class="applyjob">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'companyId')->hiddenInput(['value' => $companyId, 'readonly'=>true])->label(false)  ?>
        <?= $form->field($model, 'userId')->hiddenInput(['value' => $userId->id, 'readonly'=>true])->label(false) ?>
        <?= $form->field($model, 'seekId')->hiddenInput(['value' => $seekId->seekId, 'readonly'=>true])->label(false)  ?>
        <?= $form->field($model, 'jobId')->hiddenInput(['value' => $jobId->jobId, 'readonly'=>true])->label(false)  ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- applyjob -->
</div>
<?php
