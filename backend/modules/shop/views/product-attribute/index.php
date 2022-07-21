<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\shop\models\ProductAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-index">



    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'attr_id',
            'attr_value',
            'attr_price',
            'qty_stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
