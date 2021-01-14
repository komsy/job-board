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
    <!-- --<navbar begin> -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark body">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <div class="text-center">
                    <i class="fa fa-briefcase fa-2x" style="color: black;" aria-hidden="true"></i>
                    <a class="navbar-brand logo font-bold" style=" margin-left: 5px;" href="<?= Url::to(['site/index'])?>"><span
                            class="">
                            Job Board</span></a>
                    </a>
                </div>
                <li class="nav-item">
                    <a class="nav-link"  href="<?= Url::to(['site/index'])?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?= Url::to(['kampuni/app'])?>">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#">Companies</a>
                </li>
                <?php if(Yii::$app->user->can('admin')){?>

                <li class="nav-item dropdown dmenu">
                    <a class="nav-link dropdown-toggle" style="color: black;"+ href="#" id="navbardrop" data-toggle="dropdown">
                        Profile
                    </a>
                    <div class="dropdown-menu sm-menu">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Saved Jobs</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
           <?php }?>
            </ul>
        </div>
    </nav>
    <!-- --<navbar end> -->

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
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>My Account</h4>
                        <h6>Sign in </h6>
                        <h6>Register</h6>
                        <h6>Career Advice</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>Help Center</h4>
                        <h6>Salaries </h6>
                        <h6>Find Certifications</h6>
                        <h6>Indeed Events</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>About</h4>
                        <h6>Our Story </h6>
                        <h6>Sustainability</h6>
                        <h6>Contact Us</h6>
                    </div>
                    <div class="col-md-3 mb-md-3 mb-3">
                        <h4>Legal Staff</h4>
                        <h6>Hiring Lab </h6>
                        <h6>Browse Companies</h6>
                        <h6>Privacy Policy</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 " style="margin-top: 10px;">
                <h3>Social Media pages</h3>
                 <!-- Add font awesome icons -->
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
        </div>
        </div>
    </footer>
        <!-- / Footer-->
    <div class="footer">
    <p>&copy;&nbsp;Copyright.All rights reserved 2020. </p>
    </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
