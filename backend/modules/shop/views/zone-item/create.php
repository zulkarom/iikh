<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ZoneCost */

$this->title = 'Add Zone Location';
$this->params['breadcrumbs'][] = ['label' => 'Zone Location', 'url' => ['index', 'zone' => $model->zone_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-cost-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
