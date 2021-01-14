<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use frontend\models\Jobseeker;
use frontend\models\Kampuni;
use frontend\models\Addjob;
use frontend\models\Apply;
use common\models\User;

//$totalprice=Cart::find()->joinWith('listing')->sum('price');
//$totalitems=Cart::find()->joinWith('listing')->sum('userId');

$jobs = Apply::find()->where(['apply.userId'=>Yii::$app->user->id])->joinWith('company')->joinWith('seek')->joinWith('job')->all();
$jobo = Jobseeker::find()->joinWith('applies')->where(['jobseeker.userId'=>Yii::$app->user->id])->limit(1)->all();
?>

<div class="row">
  <div class="col-md-3 ">    
    <div class="card shadow sk text-center">
        <?php foreach ($jobo as $job ) {?>
          <div class="card-body app"><img src="<?= Yii::$app->request->baseUrl.'/'.$job->userImage ?>" class="card-img-top" alt="shoes"> <br>
            <label > Name: <?=$job->fullName ?></label>  <br>
            <label> Level of Education: <?=$job->educationLevel ?> </label><br>
            <label>Field of Study: <?=$job->fieldOfStudy ?> </label><br>
            <label>Career Objective: <?=$job->careerObjective ?> </label> <br>
            <label>Cv File: <?= $job->UploadCv ?> </label> <br>
          </div>
          <br>
       <?php } ?>
     </div>
    </div>
  <div class="col-md-9">

      <?php foreach ($jobs as $job ) {?>
    <div class="col d-flex justify-content-center" style="margin-bottom: 30px">
    
    <div class="card shadow text-center">
    <div class="row">
    <div class="col-md-9 ">
      <div class="card-body app"><img src="<?= Yii::$app->request->baseUrl.'/'.$job->company->companyImage ?>" class="card-img-top" alt="shoes"> <br>
        <label> Company Name:<?=$job->company->companyName ?></label><br>
        <label> Company's Location: <?=$job->company->location ?> </label><br>
        <label> Company's Website: <?=$job->company->website ?> </label><br>
        <label> Telephone: <?=$job->company->telephone ?> </label><br>
        <label> Industry: <?=$job->company->industry ?> </label><br>
        <label> Job Requirement: <?=$job->job->requirements ?> </label><br> 
        <label> Job Responsibility: <?=$job->job->responsibilities ?> </label><br>      
      </div> 
    </div>

    <div class="col-md-3 ">
  <!-- Button to trigger Apply now modal -->
  <a href="#"><button type="button" id="mpesa" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-secondary pull-right job" style="margin-top: 150px;">Apply Job</button></a>
   <!-- Modal -->
          <div class="modal fade pesa" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" style="margin-left: 60px;">Job Application</h4>  <br>
                  <a href="#"> <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button></a>
                </div>
                <div class="modal-body">
                 <p>Congratulations your job application was successfully made!</p>
                <div class="mode ">
                  <a href="<?= Url::to(['kampuni/listing'])?>"> <button type="button" class="btn btn-success" >Ok</button></a>
                </div>
               </div>
              </div>
            </div>
          </div><!-- / Saved jobs modal-->
          </div>    
</div>
    </div>
    </div>
    <br>
     <?php } ?>
</div>
</div>  
  

 