<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use yii\helpers\StringHelper;
use frontend\models\Kampuni;
use frontend\models\Addjob;

$this->title = 'Job Board';
$jobs = Kampuni::find()->limit(2)->all();

?>
<div class="site-index">
    <div class="row">
        <div class="col-md-6 search" style="background-color: #388D22;">
           <!-- Search form -->
        <input class="form-control" type="text" placeholder="What; Job tittle, Keywords, Company" aria-label="Search"> 
        </div>
        <div class="col-md-6 search" style="background-color: #4A1265;">
          <!-- Search form -->
        <input class="form-control" type="text" placeholder="Location; Where exactly?" aria-label="Search">  
        </div>
    </div>

    <div class="row crd">
        <div class="col">
            <h2>Popular searches</h2>
        </div>
    </div>
    <div class="row crd">
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
              <div class="card-body">
                <h5 class="card-title">Connecting you with top employers</h5>
                <p class="card-text">Your next job could be with one of these leading companies</p>
                 <?php foreach ($jobs as $job ) {?>
                <img src="<?= Yii::$app->request->baseUrl.'/'.$job->companyImage ?>" class="card-img-top" alt="shoes">
                 
               <?php } ?><br>
                <a href="<?=Url::to(['kampuni/listing']);?>" class="btn btn-secondary">View More Companies Hiring</a>
              </div>
            </div>    
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
              <div class="card-body">                
               <img src="<?=yii::$app->request->baseUrl;?>/images/srch.png" class="card-img-top" alt="shoes">
                <p class="card-text">Search recommendations for jobs that match what you're looking for </p>
                <hr>
                <h5 class="card-title">200 Jobs online now</h5>
                <a href="<?=Url::to(['kampuni/listing']);?>" class="btn btn-secondary">View All Jobs</a>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
              <div class="card-header">Stand Out! <br> How Job-Board Helps You</div>
              <div class="card-body">
                <img src="<?=yii::$app->request->baseUrl;?>/images/pic.png" class="card-img-top" alt="shoes"><br>
                <h5 class="card-title">Boost your career </h5>

                <a href="<?=Url::to(['jobseeker/create']);?> " class="btn btn-secondary">Create Your Account</a>
              </div>
            </div>
        </div>
    </div>

    <hr class="hr">
    <div class="row crd">
        <div class="col">
            <h2>Testmonials</h2>
        </div>
    </div>

    <div class="row crd" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
            <img src="<?=yii::$app->request->baseUrl;?>/images/p1.jpeg" class="card-img-top" style="margin-left: 140px; margin-top: 10px;" alt="user">
            <div class="card-body">
                <h5 class="card-title">Morris Koome</h5>
                <p class="card-text"> Human Resource and Administration Manager </p>
                <p class="card-text">I would advise other employers to also use the Job-Board platform, the costs are affordable. It also makes the process short and concise. It allows you to maintain a good database of candidatess. Obviously, it makes it much easier to make the short list for candidates even do a referral, or you could check for candidates once again.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
            <img src="<?=yii::$app->request->baseUrl;?>/images/p2.png" class="card-img-top" style="margin-left: 140px; margin-top: 10px;" alt="user">
            <div class="card-body">
                <h5 class="card-title">Morris Koome</h5>
                <p class="card-text"> Human Resource Manager </p>
                <p class="card-text">We currently have seven employees, ranging from professionals and the blue-collar staff all outsourced through Job-Board. We are completely satisfied with their service and so are our employees. They pay our staff on time, invoice us on time and are very responsive to any queries we may have and are always ready to problem solve with us if the need arises.</p>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center" style="width: 25rem;">
            <img src="<?=yii::$app->request->baseUrl;?>/images/p3.png" class="card-img-top" style="margin-left: 140px;" alt="user">
            <div class="card-body">
                <h5 class="card-title">Morris Koome</h5>
                <p class="card-text"> Administration Manager </p>
                <p class="card-text">Before we used to have to go through 1,000s of physical CVS but with Job-Board I can shortlist, filter and see who best fits and see a few at a time. I'd recommend Job-Board, not just because of the products that they offer, but also because of the customer service and the fact that you're given an account manager who walks with you through the whole process and they're friendly and helpful.</p>
            </div>
            </div>
        </div>
    </div>
   </div>
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
