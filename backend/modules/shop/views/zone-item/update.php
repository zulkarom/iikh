<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ZoneCost */

$this->title = 'Update Zone ';
$this->params['breadcrumbs'][] = ['label' => 'Zone Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zone-cost-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
