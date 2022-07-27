<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipping Rates:' . $zone->zone_name;
$this->params['breadcrumbs'][] = ['label' => 'Shipping Zone', 'url' => ['zone/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-rate-index">


    <p>
        <?= Html::a('Add Shipping Rate', ['create', 'zone' => $zone->id], ['class' => 'btn btn-success']) ?>
    </p>
    
    
     <div class="card">

<div class="card-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'weight_from',
            'weight_to',
            [
                'attribute' => 'ship_cost',
                'value' => function($model){
                    return 'RM'. $model->ship_cost;
                    
                }
                
            ],

            
            
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{update} {delete}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span> Update', 
                            ['update', 'id' => $model->id], ['class'=>'btn btn-warning btn-sm']);
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this data?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
            
            ],
        ],
    ]); ?>

</div>
</div>


</div>
