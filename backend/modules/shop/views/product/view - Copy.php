<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use backend\modules\shop\models\ProductAttribute;
use kartik\form\ActiveForm;
use richardfan\widget\JSRegister;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

backend\assets\CropperAsset::register($this);


?>
<style type="text/css">
table.detail-view th {
    width:15%;
}


</style>
<div class="product-view">

<?php

$arr = ['info', 'attr', 'price', 'image'];
$param = Yii::$app->getRequest()->getQueryParam('tab');
$default = true;
foreach($arr as $t){
    $var_tab = 'tab_active_' . $t;
    $var_con = 'con_active_' . $t;
    $$var_tab = '';
    $$var_con = '';
    if($param == $t){
        $$var_tab = 'class="active"';
        $$var_con = 'in active';
        $default = false;
    }
}

if($default){
    $tab_active_info = 'class="active"';
    $con_active_info = 'in active';
}
?>

<ul class="nav nav-tabs">
  <li <?=$tab_active_info?>><a href="#product-info" data-toggle="tab">Product Information</a></li>
  <li <?=$tab_active_attr?>><a data-toggle="tab" href="#attributes">Attributes</a></li>
    <li <?=$tab_active_price?>><a data-toggle="tab" href="#price">Price / Stock</a></li>
  <li <?=$tab_active_image?>><a data-toggle="tab" href="#image">Images</a></li>

</ul>

<div class="tab-content">
 <div class="box box-solid tab-pane fade <?=$con_active_info?>" id="product-info">
<div class="box-header">
<div class="box-title">Product Information</div>
</div>
<div class="box-body">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company.company_name',
            'category.category_name',

            [
                'attribute' => 'name',
                'options' => [
                    'style' => 'white-space: normal'
                ]
            ],
            'description:html',
            'price',
            'stock',
            'shipping',
            'weight',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($model){
					return Html::tag('span', $model->status ? 'ACTIVE' : 'INACTIVE', [
                    'class' => $model->status ? 'label label-success' : 'label label-warning'
                ]);
				}
				
				
            ],

        ],
    ]) ?>
    <br />
       <div class="form-group">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    
</div>
</div>



 
    
    
    
    
<div class="box box-solid tab-pane fade <?=$con_active_attr?>" id="attributes">
<div class="box-header">
<div class="box-title">Product Attributes</div>
</div>
<div class="box-body">
    <?= GridView::widget([
        
        'dataProvider' => $dataProvider,
        ////'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'attrName',
            'attr_value',

            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 13%'],
                'template' => '{update} {delete}',
                //'visible' => false,
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::button('<span class="fa fa-edit"></span> Edit', 
                            ['value' => Url::to(['product-attribute/update', 'id' => $model->id]), 'class'=>'btn btn-warning btn-sm modalButton']);
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', ['product-attribute/delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this attribute?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
            
            ],
        ],
    ]); ?>

   <div class="form-group">
        <?= Html::button('Add Attribute', ['value' => Url::to(['product-attribute/create', 'id' => $model->id]), 
            'class' => 'btn btn-primary modalButton']) ?>

    </div>
    
    <p>* adding or deleting attribute's group (e.g. all 'Size' attribute) will reset all prices and stock available</p>

</div>
</div>


<div class="box box-solid tab-pane fade <?=$con_active_price?>" id="price">
<div class="box-header">
<div class="box-title">Price / Stock</div>
</div>
<div class="box-body">

<?php $form = ActiveForm::begin(); ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <?php 
        $attr = $model->distinctAttributes;
        if($attr){
            foreach($attr as $a){ 
                echo  '<th width="20%">' . $a->attributeModel->attr_name . '</th>';
            }
        }
        ?>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    <?php   
    
    if($prices){
        
        foreach($prices as $i => $price){
            
            $num = $i + 1;
            echo '    <tr>
      <td>'. $num . '. </td>';
            
      $attr = json_decode($price->attr_mix);
      if($attr){
          foreach($attr as $t){
              $v = ProductAttribute::findOne($t)->attr_value;
              echo '<td>'. $v .'</td>';
          }
      }
            
      echo '<td>';
     // echo $price->price;
      echo Html::activeHiddenInput($price, "[{$i}]id");
      echo $form->field($price, "[{$i}]price", [
          'addon' => ['prepend' => ['content'=> 'RM']]
          
      ])->label(false);
      
        
        
        echo '</td>
      <td>';
        
        echo $form->field($price, "[{$i}]stock")->textInput(['type' => 'number'])->label(false);
      
      echo '</td>
    </tr>';   
        }
    }
    
    
    ?>
  </tbody>
</table>
<div class="form-group">
        
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>


<div class="box box-solid tab-pane fade <?=$con_active_image?>" id="image">
<div class="box-header">
<div class="box-title">Images</div>
</div>
<div class="box-body">
 
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Upload</th>
      </tr>
    </thead>
    <tbody>

<?php 
if($images){
	foreach($images as $i => $image){
		$num = $i + 1;
		echo '<tr>
        <td>' . $num . '</td>
        <td id="image-'.$image->id.'">';
		if($image->product_file){
		    echo '<img src="' . Url::to(['/shop/product/product-image', 'id' => $image->id]). '" width="100" />';
		}
        
        
        echo '</td>
        <td><form method="post">
                <input type="file" name="image" class="image" data-image="'. $image->id .'">
            </form></td>
      </tr>';
	}
}



?> 
      

    </tbody>
  </table>
</div>



</div>
</div>


    
</div> 
    

</div>

        <div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="img-container">
                           
                                    <!--  default image where we will set the src via jquery-->
                                    <img id="image-crop" width="100%">
                          
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="crop" data-image="0">Crop</button>
                    </div>
                </div>
            </div>
        </div>

<?php 

Modal::begin([
    'header' => '<h4>Product Attribute</h4>',
    'id' =>'modal',
    'size' => 'modal-md'
]);

echo '<div id="modalContent">Loading...</div>';

Modal::end();

Modal::begin([
    'header' => '<h4>Shipping Charge</h4>',
    'id' =>'modal',
    'size' => 'modal-md'
]);

echo '<div id="modalContent">Loading...</div>';

Modal::end();



?>




<?php JSRegister::begin(); ?>
<script>

$(function(){
  $(".modalButton").click(function(){
      $("#modal").modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalShip").click(function(){
      $("#modal").modal("show")
        .find("#modalContent")
        .load($(this).attr("value"));
  });
});

var bs_modal = $('#modal-image');
var image = document.getElementById('image-crop');
var cropper,reader,file;



$("body").on("change", ".image", function(e) {
	var files = e.target.files;
	var done = function(url) {
		image.src = url;
		bs_modal.modal({backdrop: 'static', keyboard: false}, 'show');
	};
	$("#crop").attr('data-image', $(this).attr('data-image'));

	if (files && files.length > 0) {
		file = files[0];

		if (URL) {
			done(URL.createObjectURL(file));
		} else if (FileReader) {
			reader = new FileReader();
			reader.onload = function(e) {
				done(reader.result);
			};
			reader.readAsDataURL(file);
		}
	}
});

bs_modal.on('shown.bs.modal', function() {
	cropper = new Cropper(image, {
		aspectRatio: 8/9,
		viewMode: 3,
	});
	

	
}).on('hidden.bs.modal', function() {
	cropper.destroy();
	cropper = null;
});

$("#crop").click(function() {
	$(this).text('Cropping...');
	var imgid = $(this).attr('data-image');
	canvas = cropper.getCroppedCanvas({
		width: 800,
		height: 900,
	});

	canvas.toBlob(function(blob) {
		url = URL.createObjectURL(blob);
		var reader = new FileReader();
		reader.readAsDataURL(blob);
		reader.onloadend = function() {
			var base64data = reader.result;
		
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "<?=Url::to(['/shop/product/upload-image', 'id' => ''])?>" + imgid,
				data: {image: base64data},
				success: function(data) { 
					var turl = "<?=Url::to(['/'])?>";
					var path = data.url;
					//console.log(turl + 'shop/product/product-image?id=' + imgid + '&r=' + Math.random());
					bs_modal.modal('hide');
					$("#crop").text('Crop');
					$("#image-"+imgid).html('<img src="' + turl + 'shop/product/product-image?id=' + imgid + '&r=' + Math.random() + '" width="100" />');
					
				}
			});
		};
	});
});


</script>
<?php JSRegister::end(); ?>
