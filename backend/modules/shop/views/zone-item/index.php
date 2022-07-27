<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\shop\models\ZoneCostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Zone Location';
$this->params['breadcrumbs'][] = ['label' => 'Shipping Zone', 'url' => ['zone/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-cost-index">


    <p>
        <?= Html::a('Add Location', ['create', 'zone' => $zone->id], ['class' => 'btn btn-success']) ?>
    </p>
    
     <div class="card">
<div class="card-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'stateName',
            'countryName',
            
            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{delete}',
                //'visible' => false,
                'buttons'=>[

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
