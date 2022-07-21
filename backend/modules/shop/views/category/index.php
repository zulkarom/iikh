<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">


    <p>
        <?= Html::a('New Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
     <div class="box">
<div class="box-header"></div>
<div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_name',
            [
             'label' => 'G-Shopee',
             'value' => function($model){
                return $model->gshoppeText;
             }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
</div>


</div>
