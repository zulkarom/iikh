<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\shop\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-index">
<div class="box">
<div class="box-header"></div>
<div class="box-body">
  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'fullname',
             'label' => 'Nama Pemilik',
             'value' => function($model){
                if($model->user){
                    return strtoupper($model->user->fullname);
                }
             }
            ],
            'company_name',

            [
                'label' => 'Status',
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList() ,['class'=> 'form-control','prompt' => 'Choose Status']),
                'value' => function($model){
                    if($model->status == 20){
                        return '<span class="label label-success">'.$model->statusText.'</span>';
                    }else if($model->status == 30){
                        return '<span class="label label-danger">'.$model->statusText.'</span>';
                    }else{
                        return '<span class="label label-info">'.$model->statusText.'</span>';
                    }
                }
                
            ],

            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view}',
                
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return '<a href="'.Url::to(['view', 'id' => $model->id]).'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-search"></span> View</a>';
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
<?=$form->field($searchModel, 'bttn_type',['options' => ['tag' => false]])->hiddenInput(['value' => ''])->label(false)?>

  <?= Html::button('<span class="glyphicon glyphicon-ok"></span> APPROVE SELECTED', ['name'=> 'actiontype', 'value' => 'approve', 'class' => 'btn btn-primary btn-activate']) ?>

     &nbsp;

    <?= Html::button('<span class="glyphicon glyphicon-ok"></span> DISAPPROVE SELECTED', ['name'=> 'actiontype', 'value' => 'disapprove', 'class' => 'btn btn-warning btn-activate']) ?>
 
<?php ActiveForm::end(); ?>
</div>



<?php
$js = "

$('.btn-activate').click(function(){

    var type = $(this).val();
   
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
    var typejson = JSON.stringify(type);

    $('#companysearch-selected_json').val(myJsonString);
    $('#companysearch-bttn_type').val(typejson);

    $('#form-activate').submit();
      
    // $('input[name=\'selection[]\']:checked').each(function (index, obj) {
    //     // loop all checked items
    // alert(arrLen);
    // });
});

";

$this->registerJs($js);
