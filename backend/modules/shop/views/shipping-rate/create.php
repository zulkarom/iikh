<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ShippingRate */

$this->title = 'Add Shipping Rate';
$this->params['breadcrumbs'][] = ['label' => 'Shipping Rates', 'url' => ['index', 'zone' => $zone->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-rate-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
