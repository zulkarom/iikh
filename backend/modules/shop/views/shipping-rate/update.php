<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ShippingRate */

$this->title = 'Update Shipping Rate';
$this->params['breadcrumbs'][] = ['label' => 'Shipping Rates', 'url' => ['index', 'zone' => $model->zone_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipping-rate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
