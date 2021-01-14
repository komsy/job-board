<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark bg-dark sticky-top',
        ],
    ]);



    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Jobs', 'url' => ['/kampuni/listing']],
        
        [
            'label' => 'Job Seeker',
            'items' => [
                 ['label' => 'Saved Jobs', 'url' => ['/kampuni/app']],
                 '<div class="dropdown-divider"></div>',
                 ['label' => 'Create Profile', 'url' => ['/jobseeker/create']],
            ],
        ], 
        [
            'label' => 'Employer/Post job',
            'items' => [
                ['label' => 'Create Profile', 'url' => ['/kampuni/create']],
                 '<div class="dropdown-divider"></div>',
                 ['label' => 'Add Job', 'url' => ['/kampuni/addjob']],
                 '<div class="dropdown-divider"></div>',
                 ['label' => 'Kampuni Profile', 'url' => ['/kampuni/profile']],
            ],
      ], 
      
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
      

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
       $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')',
            'url'=>['site/logout'],
            'linkOptions'=>[
                'data-method'=>'post'
            ]
        ];
    } 
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


    <!-- Footer-->
    <div class="foot" >
    <footer class="page-footer font-small blue pt-4" >
        <div class="container-fluid text-center text-md-left">
            <div class="row">
            <div class="col-md-8  ">
                <div class="row" >
                    <div class="col-md-4 mb-md-4 mb-4">
                        <a href="<?= Url::to(['site/contact'])?>">Contact Us</a>
                    </div>
                    <div class="col-md-4 mb-md-4 mb-4">
                        <a href="<?= Url::to(['kampuni/listing'])?>">Browse Companies </a>
                    </div>
                    <div class="col-md-4 mb-md-4 mb-4">
                        <a href="<?= Url::to(['kampuni/addjob'])?>">Hiring Lab </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
              <div class="row">
                  <div class="col-md-6">
                <h3>Social Media pages</h3>                  
                  </div>
                  <div class="col-md-6">
                      <!-- Add font awesome icons -->
                <a href="https://web.facebook.com/morizkonshuns.komz/" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="https://www.linkedin.com/in/morris-koome-609918138/" class="fa fa-linkedin"></a>
                  </div>
              </div>                 
            </div>
        </div>
        </div>
    </footer>
        <!-- / Footer-->
    <div class="footer">
    <p>&copy;&nbsp;komsy.All rights reserved 2020. </p>
    </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
