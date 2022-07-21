<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use richardfan\widget\JSRegister;
/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Category */

$this->title = $model->category_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

backend\assets\CropperAsset::register($this);
?>
<style>
table.detail-view th {
    width:15%;
}
.fileinput-button {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
.fileinput-button input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  -ms-filter: 'alpha(opacity=0)';
  font-size: 200px !important;
  direction: ltr;
  cursor: pointer;
}
</style>
<div class="category-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
     <div class="box">
<div class="box-header"></div>
<div class="box-body">

    <table class="table table-striped table-bordered detail-view">
  <tbody>
    <tr>
      <td rowspan="4" width="10%"><?php 
      echo '<img id="cat_image" src="'. Url::to(['category-image', 'id' => $model->id]).'" style="max-width: 100px;" />' ?>
      
      </td>
    </tr>
    <tr>
      <td width="10%"><strong>Nama Kategori</strong></td>
      <td><?php echo $model->category_name?></td>
    </tr>
    <tr>
      <td width="10%"><strong>G-Shoppe</strong></td>
      <td><?php echo $model->gshoppeText ?></td>
    </tr>
  </tbody>
</table>
<br/>
<form method="post">
    <span class="btn btn-default btn-sm fileinput-button">
      <span>Edit Gambar</span>
      <input type="file" name="image" class="image" data-image="<?=$model->id?>">
    </span>
</form>

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
                <button type="button" class="btn btn-primary" id="crop" data-image="0">Crop & Upload</button>
            </div>
        </div>
    </div>
</div>


<?php JSRegister::begin(); ?>
<script>

$(function(){
  $(".modalButton").click(function(){
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
        aspectRatio: 8/8,
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
        height: 800,
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
                url: "<?=Url::to(['/shop/category/upload-image', 'id' => ''])?>" + imgid,
                data: {image: base64data},
                success: function(data) { 
                    var turl = "<?=Url::to(['/'])?>";
                    
                    //console.log(turl + 'shop/product/product-image?id=' + imgid + '&r=' + Math.random());
                    bs_modal.modal('hide');
                    $("#crop").text('Crop');
                    // console.log(turl +'jurulatih/profile/profile-image?id=' + imgid);

                    $('#cat_image').attr('src',turl +'shop/category/category-image?id=' + imgid + '&r=' + Math.random());
                    
                }
            });
        };
    });
});


</script>
<?php JSRegister::end(); ?>
