<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use richardfan\widget\JSRegister;
/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Company */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

backend\assets\CropperAsset::register($this);


?>
<style>
table.detail-view th {
    width:25%;
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


<div class="row">
<div class="col-md-6">


<div class="box box-solid">
<div class="box-body">

<table class="table table-striped table-bordered detail-view">
  <tbody>
    <tr>
      <td rowspan="4" width="10%"><?php 
      echo '<img id="logo_image" src="'. Url::to(['logo-image', 'id' => $model->id]).'" style="max-width: 100px;" />' ?>
      
      </td>
    </tr>
    <tr>
      <td><strong>Nama Syarikat</strong></td>
      <td><?php echo $model->company_name ?></td>

    </tr>
    <tr>
      <td><strong>Status</strong></td>
      <td><?php echo $model->statusColor ?></td>

    </tr>
  </tbody>
</table>
<br/>
<form method="post">
    <span class="btn btn-default btn-sm fileinput-button">
      
      <span>Edit Gambar</span>
      <input type="file" name="image" class="image" data-image="<?=$model->id?>">
    </span> 

    <?php echo Html::a('<i class="fa fa-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm'])?> 

    <?php 
    if($model->status == 20){
        echo Html::a('Deactivate', ['register-status', 'id' => $model->id], ['class' => 'btn btn-danger btn-sm']);
    }else{
        echo Html::a('Activate', ['register-status', 'id' => $model->id], ['class' => 'btn btn-success btn-sm']);
    }
    ?>

</form>


</div>
</div>


<div class="box box-solid">
<div class="box-header">
<i class="fa fa-asterisk"></i>
<h3 class="box-title">MAKLUMAT PERIBADI</h3>

</div>
<div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        [
             'label' => 'Nama Pemilik',
             'value' => function($model){
                return $model->user->fullname;
             }
        ],
        'company_name',
        'office_phone',
        'description',
        ],
    ]) ?>

</div>
</div>



</div>

<div class="col-md-6">


<div class="box box-solid">
<div class="box-header">
<i class="fa fa-asterisk"></i>
<h3 class="box-title">ALAMAT</h3>

</div>
<div class="box-body">


<style>
table.detail-view th {
    width:40%;
}

</style>
<table class="table table-striped table-bordered detail-view">
  <tbody>
     <tr>
      <td  width="25%"><strong>Alamat Penuh</strong></td>
      <td><?=$model->user->addressPostal?></td>
    </tr>
  </tbody>
</table>



</div>
</div>

<div class="box box-solid">
<div class="box-header">
<i class="fa fa-asterisk"></i>
<h3 class="box-title">CONTACT & MEDIA SOCIAL</h3>

</div>
<div class="box-body">


<table class="table table-striped table-bordered detail-view">
  <tbody>
     <tr>
      <td  width="25%"><strong>Website</strong></td>
      <td><?=$model->website?></td>
    </tr>
    <tr>
      <td  width="25%"><strong>Whatsapp</strong></td>
      <td><?=$model->whatsapp?></td>
    </tr>
    <tr>
      <td  width="25%"><strong>Telegram</strong></td>
      <td><?=$model->telegram?></td>
    </tr>
    <tr>
      <td  width="25%"><strong>Instagram</strong></td>
      <td><?=$model->instagram?></td>
    </tr>
    <tr>
      <td  width="25%"><strong>Tiktok</strong></td>
      <td><?=$model->tiktok?></td>
    </tr>
    <tr>
      <td  width="25%"><strong>Twitter</strong></td>
      <td><?=$model->twitter?></td>
    </tr>
  </tbody>
</table>


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
                url: "<?=Url::to(['/shop/company/upload-image', 'id' => ''])?>" + imgid,
                data: {image: base64data},
                success: function(data) { 
                    var turl = "<?=Url::to(['/'])?>";
                    
                    //console.log(turl + 'shop/product/product-image?id=' + imgid + '&r=' + Math.random());
                    bs_modal.modal('hide');
                    $("#crop").text('Crop');
                    // console.log(turl +'jurulatih/profile/profile-image?id=' + imgid);

                    $('#logo_image').attr('src',turl +'shop/company/logo-image?id=' + imgid + '&r=' + Math.random());
                    
                }
            });
        };
    });
});


</script>
<?php JSRegister::end(); ?>