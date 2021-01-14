<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kampuni */

$this->title = 'Update Kampuni: ' . $model->companyId;
$this->params['breadcrumbs'][] = ['label' => 'Kampunis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->companyId, 'url' => ['view', 'id' => $model->companyId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kampuni-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
