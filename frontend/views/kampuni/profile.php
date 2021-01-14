
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\User;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use frontend\models\Kampuni;
use frontend\models\Addjob;
use frontend\models\Notification;


/* @var $this yii\web\View */

$this->title = 'Employee Profile';
$jobs = Addjob::find()->joinWith('company0')->where(['userId'=>Yii::$app->user->id])->limit(1)->all();
$notifyModel = Notification::model()->count(array('user_id'=> Yii::app()->user->uid));
?>
<div class="container">
<div class="row">
	<div class="col-md-6">
	<?php foreach ($jobs as $job ) {?>
		<div class="shadow-lg p-3 mb-5 bg-white rounded d-flex justify-content-center">
		<div class="card text-white bg-secondary mb-3" style="width: 168rem; height: 35rem;">
		  <div class="card-header">Company's Profile</div>
		  <div class="card-body">
		    <h2 class="card-title"><?=$job->company0->companyName ?></h2>
		    <p class="card-text"><?=$job->company0->website ?></p>
		    <p class="card-text"><?=$job->company0->telephone ?></p>
		    <p class="card-text"><?=$job->company0->website ?></p>
		  </div>
		</div>
		</div>
		<br>
	 <?php } ?>
	</div>
	<div class="col-md-6">
		<div class="row">
			<?php foreach ($jobs as $job ) {?>
			<div class="col">
			    <img src="<?= Yii::$app->request->baseUrl.'/'.$job->company0->companyImage?>" class="card-img-top" alt="Company Image">
			          
			    <br>
			     <?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
				  <div class="card-header">Number of jobs posted</div>
				  <div class="card-body">
				    <h5 class="card-title"><?=$notifyModel?></h5>
				   </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
				  <div class="card-header">Number of job application</div>
				  <div class="card-body">
				    <h5 class="card-title">27</h5>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>