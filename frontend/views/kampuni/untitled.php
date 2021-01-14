
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
$jobs = Addjob::find()->joinWith('company0')->all();

?>
<div class="row">
     <?php foreach ($jobs as $job ) {?>
  <div class="col-md-3 ">    
    <div class="card shadow sk text-center">
      <div class="row">
        <div class="col-md-3"> 
          <div class="card-body app"><img src="<?= Yii::$app->request->baseUrl.'/'.$job->company0->companyImage ?>" class="card-img-top" alt="shoes"><a href="#"><button type="button" val="<?=$job->company?>" val2="<?=$job->jobId?>" class="btn btn-success applyjob">Save Job</button></a> 
      </div>
    </div>
      <div class="col-md-9">
          <?=$job->company0->companyName ?><br>
          <?=$job->company0->industry ?> <br>
          <?=$job->company0->country ?> |
          <?=$job->company0->location ?> <br>
          <?=$job->responsibilities ?> <br>  
          
           <a href="#"><button type="button" val="<?=$job->company?>" val2="<?=$job->jobId?>" class="btn btn-secondary viewjob">View Job</button></a> 
      </div>
      </div>
      </div>
     </div>
          <br>
       <?php } ?>
  </div>
<div class="row crd">
        <?php foreach ($jobs as $job ) {?>
        
        <div class="col-md-3">
        <div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body app"><img src="<?= Yii::$app->request->baseUrl.'/'.$job->company0->companyImage ?>" class="card-img-top" alt="shoes"> <br>
           <label> Company Name:<?=$job->company0->companyName ?></label><br>
           <label> Country: <?=$job->company0->country ?> </label><br>
           <label> Company's Location: <?=$job->company0->location ?> </label><br>
           <label> Company's Website: <?=$job->company0->website ?> </label><br>
           <label> Telephone: <?=$job->company0->telephone ?> </label><br>
           <label> Industry: <?=$job->company0->industry ?> </label><br>
           <label> Job Description: <?=$job->requirements ?> </label><br> 
           <label> Job Description: <?=$job->responsibilities ?> </label><br>     
             
        </div>
        </div>
    </div>
        <br>
     <?php } ?>
    </div>


<?php
Modal::begin([
    'title'=>'<h4> Save Job</h4>',
    'id'=>'applyjob',
    'size'=>'model-lg',
    ]);
    echo "<div id='applyjobContent'></div>";
Modal::end();
?>
<?php
Modal::begin([
    'title'=>'<h4>Job Details</h4>',
    'id'=>'viewjob',
    'size'=>'model-lg',
    ]);
    echo "<div id='viewjobContent'></div>";
Modal::end();

?>