<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ProductAttribute */

$this->title = 'Create Product Attribute';
$this->params['breadcrumbs'][] = ['label' => 'Product Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
