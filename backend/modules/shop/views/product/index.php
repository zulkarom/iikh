<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\modules\shop\models\Category;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">


    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    
    

 <div class="card">
<div class="card-header"></div>
<div class="card-body">




    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],
                ['class' => 'yii\grid\SerialColumn'],
                
                [
                    'attribute' => 'category_id',
                    'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->all(),'id', 'category_name'), [
                        'class' => 'form-control',
                        'prompt' => 'All'
                    ]),
                    'value' => function($model){
                    if($model->category){
                        return $model->category->category_name;
                    }
                    
                    }
                    //'format' => ['orderStatus']
                    ],
                
                [
                    'attribute' => 'name',
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                    }
                ],
                'price',
                'weight',
                [
                    'attribute' => 'status',
                    'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList() ,['class'=> 'form-control','prompt' => 'Choose Status']),
                    'content' => function ($model) {
                        return Html::tag('span', $model->status ? 'ACTIVE' : 'INACTIVE', [
                            'class' => $model->status ? 'label label-success' : 'label label-danger'
                        ]);
                    }
                ],
       
               
                //'created_by',
                //'updated_by',

                ['class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 8.7%'],
                    'template' => '{view}',
                    //'visible' => false,
                    'buttons'=>[
                        'view'=>function ($url, $model) {
                        
                        return '<a href="'.Url::to(['view', 'id' => $model->id]).'" class="btn btn-warning btn-sm">
<span class="glyphicon glyphicon-search"></span> VIEW</a>';
                        }
                  ],
                        
                ],
                        
            ],
        ]); ?>
    </div>
</div>
</div>

<?php $form = ActiveForm::begin(['id'=>'form-activate']); ?>

<?=$form->field($searchModel, 'selected_json',['options' => ['tag' => false]])->hiddenInput(['value' => ''])->label(false)?>

  <?= Html::button('<span class="glyphicon glyphicon-ok"></span> DISAPPROVE SELECTED', ['id' => 'btn-activate', 'name'=> 'actiontype', 'value' => 'approve', 'class' => 'btn btn-warning']) ?>

     &nbsp;
 
<?php ActiveForm::end(); ?>
</div>



<?php
$js = "

$('#btn-activate').click(function(){


    var arrAn = [];  
  
    var m = $('input[name=\'selection[]\']:checked'); 
 
    var arrLen = $('input[name=\'selection[]\']:checked').length; 

    for ( var i= 0; i < arrLen ; i++){  
        var  w = m[i];                     
         if (w.checked){  
          arrAn.push( w.value );  
          // console.log(w.value ); 
        }  
    } 

    var myJsonString = JSON.stringify(arrAn);  //convert javascript array to JSON string

    $('#productsearch-selected_json').val(myJsonString);
    $('#form-activate').submit();
      
    // $('input[name=\'selection[]\']:checked').each(function (index, obj) {
    //     // loop all checked items
    // alert(arrLen);
    // });
});

";

$this->registerJs($js);
