<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kampuni */

$this->title = 'Create Kampuni';
$this->params['breadcrumbs'][] = ['label' => 'Kampunis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kampuni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
