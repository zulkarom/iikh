

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
?>

<div class="order-wraper">
   

    <?= ListView::widget([
     'dataProvider' => $dataProvider,
     /*'model' => $searchModel,*/
     'pager' => [
            'class' => 'yii\bootstrap4\LinkPager',
        ],
     
    
     'options' => [
         'class' => 'row gutters-sm',
         'id' => false
         
     ],
     'itemView' => function ($model) {
        return $this->render('_list_order_item',['model' => $model]);
    },
     'itemOptions' => ['tag' => null],
    ]) ?>
    
    
    
    

</div>