<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipping Zones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-index">

    <p>
        <?= Html::a('New Shipping Zone', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

 <div class="card">

<div class="card-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'zone_name',
            
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{rate} {location} {update} {delete}',
                //'visible' => false,
                'buttons'=>[
                    'rate'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-ship"></span> Set Rate',
                        ['shipping-rate/index', 'zone' => $model->id], ['class'=>'btn btn-primary btn-sm']);
                    },
                    
                    'location'=>function ($url, $model) {
                    return Html::a('<span class="fa fa-globe"></span> Set Location',
                        ['zone-item/index', 'zone' => $model->id], ['class'=>'btn btn-info btn-sm']);
                    },
                    
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
