
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
  <div class="col-md-4" >    
    <div class="card shadow crd text-center" style="margin-left: 40px; width: 35rem;">
      <div class="row">
        <div class="col-md-3"> 
          <div class="card-body app"><img src="<?= Yii::$app->request->baseUrl.'/'.$job->company0->companyImage ?>" class="card-img-top" alt="shoes">
      </div>
    </div>
      <div class="col-md-9">
          <?=$job->company0->companyName ?> <br>
          <?=$job->company0->industry ?> <br>
          <?=$job->company0->country ?> |
          <?=$job->company0->location ?> <br>
          <?=$job->responsibilities ?> <br>  
          <?=$job->createdAt ?> <br>  
            
      </div>
      </div>
      <div class="row">
        <div class="col" style="margin-bottom:20px;">
          <a href="#"><button type="button" val="<?=$job->company?>" val2="<?=$job->jobId?>" class="btn btn-success applyjob" style="margin-right: 50px;" >Save Job</button></a> 
           <a href="<?=Url::to(['kampuni/viewjob', 'id'=>$job->jobId, 'companyId'=>$job->company])?>"><button type="button" class="btn btn-secondary ">View Job</button></a> <!--passing jobid and companyid for specific job to the kampuni controller-->
        </div>
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