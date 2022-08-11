<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Negeri;
use backend\models\Fpx;
use yii\helpers\Url;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

<style type="text/css">
  .plus-minus input {
     width: 100px; 
  
}

.help-block{
    color:red;
  }

</style>

<div class="breadcrumb-wrap">
  <div class="banner">
    <div class="container-lg">
      <div class="breadcrumb-box">
        <div class="heading-box">
          <h2>Pesan 2i+Honey Sekarang!</h2>
        </div>

      </div>
    </div>
  </div>
</div>
    
   <!-- Product Section Start -->
      <section class="product-page">
        <div class="container-lg">
          <div class="row g-3 g-xl-4 view-product">
            <div class="col-md-7">
              <div class="slider-box sticky off-50 position-sticky">
                <div class="row g-2">
                  <div class="col-2">
                    <div class="thumbnail-box">
                      <div class="swiper thumbnail-img-box thumbnailSlider2">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="<?=$dirAsset?>/images/ikhtiar/produk/product-1a.jpg" alt="img" />
                          </div>

                          <div class="swiper-slide">
                            <img src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="img" />
                          </div>

                          <div class="swiper-slide">
                            <img src="<?=$dirAsset?>/images/ikhtiar/produk/product-4.jpg" alt="img" />
                          </div>

                          <div class="swiper-slide">
                            <img src="<?=$dirAsset?>/images/ikhtiar/produk/product-2.jpg" alt="img" />
                          </div>

                          <div class="swiper-slide">
                            <img src="<?=$dirAsset?>/images/ikhtiar/produk/product-1.jpg" alt="img" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-10 ratio_square">
                    <div class="swiper mainslider2">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-1a.jpg" alt="img" />
                        </div>

                        <div class="swiper-slide">
                          <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-2.jpg" alt="img" />
                        </div>

                        <div class="swiper-slide">
                          <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="img" />
                        </div>

                        <div class="swiper-slide">
                          <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-4.jpg" alt="img" />
                        </div>

                        <div class="swiper-slide">
                          <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-1.jpg" alt="img" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tabs Start -->
          <div class="description-box">
            <div class="row gy-4">
              <div class="col-12">
                <!-- Tabs Filter Start -->
                <ul class="nav nav-pills nav-tabs2 row-tab" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                      Description
                    </button>
                  </li>
                </ul>
                <!-- Tabs Filter End -->
              </div>

              <div class="col-12">
                <br/>
                <h2><?=$product->name?></h2>
                <!-- Tab Content Start -->
                <div class="tab-content" id="pills-tabContent">
                  <!-- Description Tab Content Start -->
                  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="details-product" style="padding-top:30px">


                    2i+Honey terdiri daripada campuran bahan asli madu tualang, pati delima, minyak habbatus’sauda dan minyak zaitun telah diamalkan oleh saudara Ikmalul Iktimam sebagai supplement hariannya sehingga beliau kini pulih sepenuhnya kembali, dengan izin Allah.<br /><br />

Produk ini sesuai untuk mereka yang mengalami diabetes, masalah jantung, saraf, gastrik, lemah antibodi, sakit sendi, keletihan dan kelesuan, luka dalaman (ulser perut), masalah pencernaan, asthma, anemia dan masalah pada sistem urinari. <br /><br />

Bagi mereka yang sihat, ambil satu (1) sachet sehari sebelum sarapan. Bagi yang mempunyai masalah kesihatan pula, ambil dua (2) sachet sehari pada waktu pagi dan malam. <br /><br />
                      

                  
                    </div>
                  </div>
                  <!-- Description Tab Content End -->
                  <br/>

                </div>
                <!-- Tab Content End -->
              </div>
            </div>
          </div>
          <!-- Tabs End -->
              </div>



            </div>

            <div class="col-md-5">
              <div class="product-detail-box">
                <div class="product-option">
                  <?php $form = ActiveForm::begin(); ?>
                   
                  <h2><?=$product->name?></h2>
                  <div class="option rating-option">
                    <ul class="rating p-0">
                      <li>
                        <i class="fill" data-feather="star"></i>
                      </li>
                      <li>
                        <i class="fill" data-feather="star"></i>
                      </li>
                      <li>
                        <i class="fill" data-feather="star"></i>
                      </li>
                      <li>
                        <i class="fill" data-feather="star"></i>
                      </li>
                      <li>
                        <i class="fill" data-feather="star"></i>
                      </li>
                    </ul>
                    <span>120 Rating</span>
                  </div>

                  <div class="option price"><span>RM</span><span class="item-price"><?=$product->price?> </span></div>

                  <div class="option">
                    <p class="content-color">
                      Pati Campuran Madu Tualang, Delima & Habbatus'sauda
                    </p>
                  </div>

                  

                  <div class="option-side">
                    <div class="option">
                      <div class="title-box4">
                        <h4 class="heading">Kuantiti: <span class="bg-theme-blue"></span></h4>
                      </div>
                      <div class="plus-minus">
                        <i class="sub" data-feather="minus"></i>

                        <input id="quantity" name="quantity" class="quantity form-control" type="number" value="1" min="1" max="1000" />
                        <i class="add" data-feather="plus"></i>
                      </div>
                    </div>
                  </div>

                  <div class="option total-price" style="">
                      <div class="title-box4">
                        <h5>Jumlah: RM <font id="amount">100.00</font><span class="bg-theme-blue"></span></h5>
                      </div>
                  </div>


               

                  
                  <br />
                  <div class="option sale-details">
                    <div class="title-box4">
                      
                      <h4 class="heading">Alamat Penghantaran<span class="bg-theme-blue"></span></h4>
                    </div>
                      <?php if(Yii::$app->user->isGuest){?>
                        <div class="option login-content">
                    <div class="alert alert-primary" role="alert">
                      
                    <a id="login-link"  data-bs-toggle="modal" data-bs-target="#loginAction" type="button" role="tab" aria-controls="description" aria-selected="true">
                      Jika anda telah mempunyai akaun, sila klik di sini untuk log masuk.
                    </a>
                  
                    </div>
                  </div>
                    <?php }else{
                      ?>

                    <div class="alert alert-primary" role="alert">
                      
                     
                    Maklumat akaun log masuk anda: <?=Yii::$app->user->identity->fullname?> (<?=Yii::$app->user->identity->email?>) <br />
                    Alamat penghantaran di bawah adalah mengikut maklumat profil anda. Sila masukkan maklumat lain jika sekiranya penghantaran ke alamat yang berbeza.
              
                    
                      </div>

                    <?php
                    }
                    ?>



                    
                        <br />
                    
                    <div class="custom-form form-pill">
                   
              <div class="row g-3 g-md-4">
                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($order, 'fullname')->textInput(['id' => 'fullname', 'class' => 'form-control'])->label('Nama Penuh') ?>
                  </div>
                </div>

              

                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'address')->textarea(['id' => 'address', 'class' => 'form-control']) ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'city')->textInput(['id' => 'city', 'class' => 'form-control']) ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'zipcode')->textInput(['id' => 'zipcode', 'class' => 'form-control', 'type'=>'number']) ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'state_id')->dropDownList( ArrayHelper::map(Negeri::find()->orderBy('negeri_name')->all(),'id', 'negeri_name'), ['id' => 'state', 'prompt' => 'Select State', 'class' => 'form-select form-control']);?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'country_code')->dropDownList(['MY' => 'Malaysia'], ['id' => 'country']);?>
                  </div>
                </div>

                <?php if(Yii::$app->user->isGuest){?>
                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($order, 'email')->textInput(['id' => 'email', 'class' => 'form-control']) ?>
                  </div>
                </div>
                <?php } ?>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'phone')->textInput(['id' => 'phone', 'class' => 'form-control', 'type'=>'number']) ?>
                  </div>
                </div>

                
              </div>
                    </div>


















                    
            
                  </div>

                  
                  <div class="option sale-details">
                    <div class="title-box4">
                      <h4 class="heading">Kaedah Pembayaran<span class="bg-theme-blue"></span></h4>
                    </div>
                    <div class="row g-3 g-md-4">
                      <div class="col-12">
                        <img src="<?=$dirAsset?>/images/ikhtiar/payment/Billplz.png"  style="width:80%;">
                      </div>
                      <div class="col-12">
                        <br/>
                        <?= $form->field($order, 'bank_code')->dropDownList( ArrayHelper::map(Fpx::find()->orderBy('bank_name')->all(),'bank_code', 'bank_name'), ['prompt' => 'Sila Pilih', 'class' => 'form-select form-control'])->label('Perbankan Atas Talian');?>
                      </div>
                    </div>
                  </div>

                  <div class="container-lg summary" style="">
                    <div class="row g-3 g-md-4 cart">
                      <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="summery-box">
                          <div class="row g-3 g-lg-4">
                            <div class="col-12">
                              <div class="summery-wrap">
                                <div class="cart-wrap grand-total-wrap">
                                  <div>
                                    <div class="order-summery-box">
                                      <h5 class="cart-title">Ringkasan</h5>
                                      <ul class="order-summery">
                                        <li>
                                          <span>Produk</span>
                                          <span><?=$product->name?></span>
                                        </li>

                                        <li>
                                          <span>Harga</span>
                                          <span><?=$product->price?></span>
                                        </li>

                                        <li>
                                          <span>Kuantiti</span>
                                          <span id="sum-quantity">1</span>
                                        </li>

                                        <li>
                                          <span>Kos Penghantaran</span>
                                          <span id="show-ship-cost" data-url="<?php echo Url::to(['/product/shipping-cost'])?>" data-cost="0.00">0.00</span>
                                        </li>

                                        <li class="pb-0">
                                          <span>Jumlah</span>
                                          <span id="sum-total">
                                           
                                            
                                          </span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="summery2">
                                <div class="row g-4">
                                  <div class="col-12">
                                    <div class="order-summery-box">
                                      <h5 class="cart-title">Alamat Penghantaran</h5>
                                    </div>
                                    <?php if(!Yii::$app->user->isGuest){?>
                                      <ul>
                                        <li><span id="li-name"><?=$order->fullname?></span></li>
                                        <li><span id="li-email"><?=$order->email?></li>
                                         
                                        <li>
                                          <span id="li-address"><?=($orderAddress->address ? $orderAddress->address :'').', '?></span>
                                          <span id="li-zipcode"><?=($orderAddress->zipcode ? $orderAddress->zipcode :'').', '?></span>
                                          <span id="li-city"><?=($orderAddress->city ? $orderAddress->city :'').', '?></span>
                                          <span id="li-state"><?=($orderAddress->state ? $orderAddress->stateName :'').', '?></span>
                                          <span id="li-country"><?=($orderAddress->country ? $orderAddress->countryName :'')?></span>
                                        </li>
                                        <li><span id="li-phone"><?=($orderAddress->phone ? $orderAddress->phone :'')?></li>
                                        
                                      </ul>
                                    <?php }else { ?>
                                        <ul>
                                        <li><span id="li-name"></span></li>
                                        <li><span id="li-email"></li>
                                        <li>
                                          <span id="li-address"></span>
                                          <span id="li-zipcode"></span>
                                          <span id="li-city"></span>
                                          <span id="li-state"></span>
                                          <span id="li-country"></span>
                                        </li>
                                        <li><span id="li-phone"></li>
                                      </ul>
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br/>

                  <div class="btn-group">
                      <?= Html::submitButton('BUAT BAYARAN', ['class' => 'btn-solid btn-sm addtocart-btn']) ?>
                  </div>

                  <?php ActiveForm::end(); ?>
                </div>
              </div>
            </div>
          </div>

        
        </div>
      </section>
      <!-- Product Section End -->
    </main>

    <div class="modal fade modal-md" id="loginAction" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
                      <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="addNewAddressLabel">LOG MASUK</h5>
                          <span class="close-modal" data-bs-dismiss="modal"><i data-feather="x"></i></span>
                        </div>

                        <form id="loginForm" class="custom-form form-pill">
        
              
                          <div class="modal-body full-grid-mobile">

                          <div class="row g-3 g-md-4">
                              <div class="col-12">
                                <div class="input-box">
                                  <label for="login-email">Alamat Emel</label>
                                  <input class="form-control" type="email" required name="email" id="login-email" />
                                </div>
                              </div>

                              <div class="col-12">
                                  <div class="input-box">
                                    <label for="login-password">Password</label>
                                      <input class="form-control" type="password" required name="password" id="login-password">

                                      <span class="error"><p id="name_error"></p></span>
                   
                                  </div>
                                  <span id="warning-msg"></span>
                          </div>

                          </div>

                          </div>

                          <div class="modal-footer">
                          <div class="btn-box">
                            <button type="button" class="btn btn-outline rounded-pill" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
                            <button type="button" id="btn-login" class="btn btn-solid line-none rounded-pill" data-url="<?php echo Url::to(['/site/login-ajax'])?>">Log Masuk <i class="arrow"></i></button>
                          </div>


<div align="center"><a class="forgot-link" href="forgot-password.html">Forgot Password?</a></div>

<div><span class="backto-link font-default content-color text-decoration-none">If you are new, <a class="text-decoration-underline theme-color" href="register.html"> Create Now </a> </span>
</div>

                        </div>


                        </form>


                        </div>
                      </div>
                    </div>



<?php 

$this->registerJs("

calc();
calcShipping();

$(document).ready(function(){
   $('#loginForm').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        }
    });
});


$('#btn-login').click(function(){
   
    var email = $('#login-email').val();
    var password = $('#login-password').val();
    var url = $('#btn-login').attr('data-url');
    // alert(email);
    $.ajax({
    url: url, 
    type: 'POST',  
    data: { 
        email: email,
        password: password,
    },
    success: function(result){
      document.getElementById('name_error').innerHTML = '';
      // console.log(result);
        if(result){
          // var data = result;
          
          var data = JSON.parse(result);
          // console.log(data);

          if(data.message != 'error'){

            $('#fullname').val(data.fullname);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#country').val(data.country);
            $('#zipcode').val(data.zipcode);
            $('#phone').val(data.phone);

            //summary
            $('#li-name').text(data.fullname);
            $('#li-email').text(data.email);
            $('#li-address').text(data.address);
            $('#li-city').text(data.city);
            $('#li-state').text(data.state);
            $('#li-country').text(data.country);
            $('#li-zipcode').text(data.zipcode);
            $('#li-phone').text(data.phone);
            
          
           $('#loginAction').modal('toggle');
           // $('.login-content').slideUp();
           // $('.login-content').remove();

          calc();
          calcShipping();

        }else{
          document.getElementById('name_error').innerHTML = 'Incorrect email or password.';
        }
      }
    }
    });
});

$('#state').change(function(){
    calcShipping();
});


function calcShipping(){
  var country = $('#country').val();
    var quantity = $('#quantity').val();
    var url = $('#show-ship-cost').attr('data-url');
    $.ajax({
    url: url, 
    type: 'POST',  
    data: { 
        country: country,
        state: $('#state').val(),
        quantity : quantity,
    },
    success: function(result){
      // console.log(result);
        var cost = parseFloat(result);
        $('#show-ship-cost').text(cost.toFixed(2));
        $('#show-ship-cost').attr('data-cost', cost.toFixed(2));

        var total = 0;
        var totalCharge = 0;
        price = parseFloat($('.item-price').text());

        quantity = parseInt($('.quantity').val());
        if(price && quantity){
            total = (price * quantity);
        }
        totalCharge = total + cost;
        $('#sum-total').text('RM'+totalCharge.toFixed(2));

    }
    });
}


function calc(){

    var price = 0;
    var quantity = 0;
    var total = 0;
    
        price = parseFloat($('.item-price').text());

        quantity = $('.quantity').val();
        if(price && quantity){
            total = (price * quantity);
        }
    
    $('#amount').text((parseFloat(total)).toFixed(2));
    
    $('#sum-quantity').text(quantity);
    
}


$('.add').click(function(){
  calc();
  calcShipping();
  
});
$('.sub').click(function(){
  calc();
  calcShipping();
 
});

$('.quantity').change(function(){
  calc();
  calcShipping();
  
});




$('#fullname').on('input', function() {
  $('#li-name').text(this.value);
});

$('#email').on('input', function() {
  $('#li-email').text(this.value);
});

$('#address').on('input', function() {
  $('#li-address').text(this.value);
});

$('#zipcode').on('input', function() {
  $('#li-zipcode').text(this.value);
});

$('#city').on('input', function() {
  $('#li-city').text(this.value);
});


$('#state ').on('change', function() {
  var state = $('#state option:selected ').text();
  $('#li-state').text(state);
});

$('#country ').on('change', function() {
  var country = $('#country option:selected ').text();
  $('#li-country').text(country);
});

$('#phone').on('input', function() {
  $('#li-phone').text(this.value);
});


");



?>