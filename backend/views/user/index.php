<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

<div class="card">
  <div class="card-body">
    

  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fullname',
            'email:email',

            ['class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width: 10%'],
           'template' => '{update}',
           //'visible' => false,
           'buttons'=>[
               'update'=>function ($url, $model) {
                   return Html::a('VIEW',['view', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
               }
           ],
       
       ],

            
        ],
    ]); ?>


  </div> 
</div>




</div>
