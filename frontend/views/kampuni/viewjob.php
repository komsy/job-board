<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use frontend\models\Kampuni;
use frontend\models\Addjob;

/* @var $this yii\web\View */

$this->title = 'Employee Profile';
  ?>

    <!--------------------------------Profile------------------------------------------------------->
        <div class="container mt-5">
            <div class="card shadow  text-center" style="width: 50rem;">
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?= Yii::$app->request->baseUrl.'/'.$products->company0->companyImage ?>" class="card-img-top app" alt="...">
                      <div class="card-body">
                        <label> Company Name:<?=$products->company0->companyName ?></label><br>
                        <label> Company's Location: <?=$products->company0->location ?> </label><br>
                        <label> Company's Website: <?=$products->company0->website ?> </label><br>
                        <label> Telephone: <?=$products->company0->telephone ?> </label><br>
                        <label> Industry: <?=$products->company0->industry ?> </label><br>
                      </div>
                  </div>
                 <div class="col-md-6">
                    <h3><?=$products->positionName?></h3>
                        <p><strong>Salary</strong><span class="mx-2"><?=$products->salaryRange?></span></p>
                    
                    <h4>Job Description</h4>
                        <p><?=$products->responsibilities?></p>
                    <h4>Job Requirements</h4>
                        <p> <?=$products->requirements?></p></div>
                        <!-- Button to trigger Apply now modal -->
                        <a href="#"><button type="button" id="mpesa" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-info pull-right job" style="margin-left:400px; ">Apply Job</button></a>
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
   
    <!--------------------------------------------------------------------------------------------------->