<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Expert;
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
</style>

<!-- Main Start -->
    <main class="main">
      <!-- Breadcrumb Start -->
      <div class="breadcrumb-wrap">
        <div class="banner">
          <img class="bg-img bg-top" src="<?=$dirAsset?>/images/inner-page/banner-p.jpg" />

          <div class="container-lg">
            <div class="breadcrumb-box">
              <div class="heading-box">
                <h1>Product</h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li class="current"><a href="product.html">Product</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->
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
              </div>
            </div>

            <div class="col-md-5">
              <div class="product-detail-box">
                <div class="product-option">
                   
                  <h2>2i+Honey</h2>
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

                  <div class="option price"><span>RM</span><span class="item-price">100.00 </span></div>

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
                        <input class="quantity form-control" type="number" value="1" min="1" max="1000" />
                        <i class="add" data-feather="plus"></i>
                      </div>
                    </div>
                  </div>

                  <div class="option total-price" style="">
                      <div class="title-box4">
                        <h4 class="heading">Jumlah: RM <font id="amount">100.00</font><span class="bg-theme-blue"></span></h4>
                      </div>
                  </div>


                  <div class="option login-content">
                    <!-- <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#loginAction">Jika anda telah mempunyai akaun, sila login</a> -->

                    <?php if(Yii::$app->user->isGuest){?>
                    <button id="login-link" class="nav-link"  data-bs-toggle="modal" data-bs-target="#loginAction" type="button" role="tab" aria-controls="description" aria-selected="true">
                      Jika anda telah mempunyai akaun, sila login
                    </button>
                  <?php }?>

                    
                  </div>

                  

                  <div class="option sale-details">
                    <div class="title-box4">
                      <h4 class="heading">Alamat Penghantaran<span class="bg-theme-blue"></span></h4>
                    </div>
                    <?php $form = ActiveForm::begin(); ?>
                   
              <div class="row g-3 g-md-4">
                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($order, 'fullname')->textInput(['id' => 'fullname', 'class' => 'form-control'])->label('Nama Penuh') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($order, 'email')->textInput(['id' => 'email', 'class' => 'form-control'])->label('Email') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'phone')->textInput(['id' => 'phone', 'class' => 'form-control', 'type'=>'number'])->label('No Telefon') ?>
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'address')->textInput(['id' => 'address', 'class' => 'form-control'])->label('Alamat') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'city')->textInput(['id' => 'city', 'class' => 'form-control'])->label('Bandar') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'zipcode')->textInput(['id' => 'zipcode', 'class' => 'form-control', 'type'=>'number'])->label('Poskod') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'state_id')->dropDownList( ArrayHelper::map(Negeri::find()->orderBy('negeri_name')->all(),'id', 'negeri_name'), ['id' => 'state', 'prompt' => 'Select State', 'class' => 'form-select form-control'])->label('Negeri');?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($orderAddress, 'country_code')->dropDownList(['MY' => 'Malaysia', 'IND' => 'Indonesia'], ['id' => 'country'])->label('Negara');?>
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
                        <img src="<?=$dirAsset?>/images/ikhtiar/payment/Billplz.png"  style="width:100%;">
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
                                          <span>2i+Honey</span>
                                        </li>

                                        <li>
                                          <span>Harga</span>
                                          <span>RM100.00</span>
                                        </li>

                                        <li>
                                          <span>Kuantiti</span>
                                          <span id="sum-quantity">1</span>
                                        </li>

                                        <li class="pb-0">
                                          <span>Jumlah</span>
                                          <span id="sum-total">RM100.00</span>
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
                                          <span id="li-address"><?=$orderAddress->address.', '?></span>
                                          <span id="li-zipcode"><?=$orderAddress->zipcode.', '?></span>
                                          <span id="li-city"><?=$orderAddress->city.', '?></span>
                                          <span id="li-state"><?=$orderAddress->state->negeri_name.', '?></span>
                                          <span id="li-country"><?=$orderAddress->state->negeri_name?></span>
                                        </li>
                                        <li><span id="li-email"><?=$orderAddress->phone?></li>
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
                                        <li><span id="li-email"></li>
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
                      <?= Html::submitButton('Make Payment', ['class' => 'btn-solid btn-sm addtocart-btn']) ?>
                  </div>

                  <?php ActiveForm::end(); ?>
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
                <!-- Tab Content Start -->
                <div class="tab-content" id="pills-tabContent">
                  <!-- Description Tab Content Start -->
                  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="details-product">
                      

                      <div class="title-box4 mb-3 mt-4">
                        <h4 class="heading mt-0">Ada pantang larang tak? <span class="bg-theme-blue"></span></h4>
                      </div>

                  

                      <div class="row g-3 g-lg-4 ratio_landscape mb-3">
                      
                        <div class="col-md-12">
                          <div class="speciation-summery">
                            <ul class="general-summery">
                              <li>
                                <i data-feather="check-circle"></i>
                                <span> Jarakkan 30minit selepas / sebelum pengambilan ubatan.</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Tidak digalakkan untuk ibu mengandung</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Elakkan daripada pengambilan dengan minuman berkaffein/ berkarbonat secara serentak.</span>
                              </li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="title-box4 mb-3 mt-4">
                        <h4 class="heading mt-0">Betul ke berkesan? <span class="bg-theme-blue"></span></h4>
                      </div>

                  

                      <div class="row g-3 g-lg-4 ratio_landscape mb-3">
                      
                        <div class="col-md-12">
                          <div class="speciation-summery">
                            <ul class="general-summery">
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Kesan adalah berbeza bagi setiap individu bergantung pada faktor kekerapan GUNA dan juga tahap kesihatan tubuh individu terbabit.</span>
                              </li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>

                      

                      <div class="title-box4 mb-3 mt-4">
                        <h4 class="heading mt-0">Cara guna macam mana? <span class="bg-theme-blue"></span></h4>
                      </div>
                      <div class="row row g-3 g-lg-4">
                        <div class="col-md-8 order-2 order-md-1">
                          <div class="speciation-summery">
                            <ul class="general-summery">
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Bagi yang sihat – Ambil satu (1) sachet sehari sebelum sarapan.</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Bagi yang mempunyai masalah kesihatan – Ambil dua (2) sachet sehari pada waktu pagi dan malam.</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Description Tab Content End -->

                </div>
                <!-- Tab Content End -->
              </div>
            </div>
          </div>
          <!-- Tabs End -->
        </div>
      </section>
      <!-- Product Section End -->
    </main>

    <div class="modal fade modal-md" id="loginAction" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
                      <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                         <!--  <div class="modal-header">
                            <h5 class="modal-title" id="loginLabel">Login</h5>
                            
                          </div> -->
                          <span class="close-modal" data-bs-dismiss="modal"><i data-feather="x"></i></span>
                          <div class="modal-body full-grid-mobile">
                            <div>
                                <h3>LOGIN <span class="bg-theme-blue"></span></h3>
                                <br/>

                                <div class="custom-form form-pill">
                                  <div class="input-box">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" required="" name="email" id="login-email">
                                  </div>

                                  <div class="input-box">
                                    <label for="password">Password</label>
                                    <div class="icon-input">
                                      <input class="form-control" type="password" required="" name="password" id="login-password">
                                      <img class="showHidePassword" src="<?=$dirAsset?>/icons/svg/eye-1.svg" alt="eye">
                                    </div>
                                  </div>

                                  <div align="right"><a class="forgot-link" href="forgot-password.html">Forgot Password?</a></div>

                                  <center><button id="btn-login" type="submit" class="btn-solid rounded-pill line-none" data-url="<?php echo Url::to(['/site/login'])?>">Login <i class="arrow"></i></button></center>
                                  
                                </div>

                                <center><span class="backto-link font-default content-color text-decoration-none">If you are new, <a class="text-decoration-underline theme-color" href="register.html"> Create Now </a> </span></center>
                                
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>


<?php 

$this->registerJs("

$('#btn-login').click(function(){
    var email = $('#login-email').val();
    var password = $('#login-password').val();
    var url = $('#btn-login').attr('data-url');
    // alert(password);
    $.ajax({
    url: url, 
    type: 'POST',  
    data: { 
        email: email,
        password: password,
    },
    success: function(result){
        if(result){
          // var data = result;
          
          var data = JSON.parse(result);
          // console.log(data);

            $('#fullname').val(data.fullname);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#country').val(data.country);
            $('#zipcode').val(data.zipcode);
            $('#phone').val(data.phone);

            //summary

            
          
           $('#loginAction').modal('toggle');
           $('.login-content').slideUp();
           $('.login-content').remove();
        }
    }
    });
});


function calc(){

    var price = 0;
    var quantity = 0;
    var total = 0;
    
        price = parseFloat($('.item-price').text());
        quantity = $('.quantity').val();
        if(price && quantity){
            total = price * quantity;
        }
    
    $('#amount').text((parseFloat(total)).toFixed(2));
    $('#sum-total').text('RM'+(parseFloat(total)).toFixed(2));
    $('#sum-quantity').text(quantity);
    
}

$('.add').click(function(){
  calc();
});
$('.sub').click(function(){
  calc();
});

$('.quantity').change(function(){
  calc();
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

$('#state').on('input', function() {
  $('#li-state').text(this.value);
});



");



?>