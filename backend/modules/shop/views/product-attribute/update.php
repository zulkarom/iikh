<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ProductAttribute */

$this->title = 'Update Product Attribute: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-attribute-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
