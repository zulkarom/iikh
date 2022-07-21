<?php

use backend\modules\shop\models\Order;
use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>


 <div class="box">
<div class="box-header"></div>
<div class="box-body">




<div class="order-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'ordersTable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'fullname',
                'content' => function ($model) {
                    $ship = '';
                    if($model->ship_method == 2){
                        $ship = '<br> *self-picked';
                    }
                    return $model->fullname.$ship;
            },
                    

            ],
            'total_price',
            //'email:email',
            //'transaction_id',
            //'paypal_order_id',
            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', Order::getStatusList(), [
                    'class' => 'form-control',
                    'prompt' => 'All'
                ]),
                'format' => 'html',
                'value' => function($model){
                    return $model->statusLabel;
                }
                //'format' => ['orderStatus']
            ],
            'created_at:datetime',
            //'created_by',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width: 8.7%'],
            'template' => '{update}',
            //'visible' => false,
            'buttons'=>[
            'update'=>function ($url, $model) {
            return Html::a('<span class="glyphicon glyphicon-search"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
            }
            ],
            
            ],
            
        ],
    ]); ?>


</div></div>
</div>
