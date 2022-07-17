<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Expert;
use kartik\select2\Select2;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

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

                  <div class="option price"><span> RM100.00 </span></div>

                  <div class="option">
                    <p class="content-color">
                      100% Cotton Indigo shirt with western yoke. Apt for casual outings, this shirt will keep you comfortable and stylish all day long.Indigo shirt with western yoke. Apt for casual
                      outings
                    </p>
                  </div>

                  <?php $form = ActiveForm::begin(); ?>

                  <div class="option-side">
                    
                    <div class="option">
                      <div class="title-box4">
                        <h4 class="heading">Kuantiti: <span class="bg-theme-blue"></span></h4>
                      </div>
                      <div class="plus-minus">
                        <i class="sub" data-feather="minus"></i>
                        <input type="number" value="1" min="1" max="10" />
                        <i class="add" data-feather="plus"></i>
                      </div>
                    </div>
                  </div>

                  <div class="option">
                    <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#loginAction">Jika anda telah mempunyai akaun, sila login</a>

                    <div class="modal fade" id="loginAction" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
                      <div class="modal-sm modal-dialog modal-dialog-centered">
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
                                    <input class="form-control" type="email" required="" name="email" id="email">
                                  </div>

                                  <div class="input-box">
                                    <label for="password">Password</label>
                                    <div class="icon-input">
                                      <input class="form-control" type="password" required="" name="password" id="password">
                                      <img class="showHidePassword" src="<?=$dirAsset?>/icons/svg/eye-1.svg" alt="eye">
                                    </div>
                                  </div>

                                  <div align="right"><a class="forgot-link" href="forgot-password.html">Forgot Password?</a></div>
                                  <br/>

                                  <center><button type="submit" class="btn-solid rounded-pill line-none">Login <i class="arrow"></i></button></center>
                                  
                                </div>

                                <br/>
                                <center><span class="backto-link font-default content-color text-decoration-none">If you are new, <a class="text-decoration-underline theme-color" href="register.html"> Create Now </a> </span></center>
                                
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  

                  <div class="option sale-details">
                    <div class="title-box4">
                      <h4 class="heading">Alamat<span class="bg-theme-blue"></span></h4>
                    </div>
                    <form action="javascript:void(0)" class="custom-form form-pill">
              <div class="row g-3 g-md-4">
                <div class="col-12">
                  <div class="input-box">
                    <label for="name">Nama Penuh</label>
                    <input class="form-control" type="text" required name="name" id="name" />
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <label for="email2">Email</label>
                    <input class="form-control" type="email" required name="email" id="email2" />
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <label for="mobile2">No Telefon</label>
                    <input maxlength="9" class="form-control" type="number" required name="mobile2" id="mobile2" />
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-box">
                    <label for="address3">Alamat</label>
                    <input class="form-control" type="text" required name="address3" id="address3" />
                  </div>
                </div>

                

                <div class="col-6 col-sm-4">
                  <div class="input-box">
                    <label for="country">Negara</label>
                    <select class="form-select form-control" id="country">
                      <option selected disabled value="">Choose...</option>
                      <option>United States</option>
                      <option>India</option>
                      <option>America</option>
                      <option>South America</option>
                      <option>Dubai</option>
                      <option>Hong Kong</option>
                      <option>Indonesia</option>
                      <option>Pakistan</option>
                      <option>Saudi Arabia</option>
                      <option>China</option>
                    </select>
                  </div>
                </div>

                <div class="col-6 col-sm-4">
                  <div class="input-box">
                    <label for="city2">Bandar</label>
                    <select class="form-select form-control" id="city2">
                      <option selected disabled value="">Choose...</option>
                      <option>Almaty</option>
                      <option>India</option>
                      <option>America</option>
                      <option>South America</option>
                      <option>Dubai</option>
                      <option>Hong Kong</option>
                      <option>Indonesia</option>
                      <option>Pakistan</option>
                      <option>Saudi Arabia</option>
                      <option>China</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="input-box">
                    <label for="zip">Zip Code</label>
                    <input maxlength="4" class="form-control" type="number" required name="zip" id="zip" />
                  </div>
                </div>
              </div>
            </form>
                  </div>

                  <div class="option"> 
                    <div class="row g-3 g-md-4">
                      <div class="col-6">
                        <img src="<?=$dirAsset?>/images/ikhtiar/payment/Billplz.png"  style="width:100%;">
                      </div>
                      <div class="col-6">
                        <img src="<?=$dirAsset?>/images/ikhtiar/payment/fpx.png"  style="width:100%;">
                      </div>
                    </div>


                      
                  </div>

                  <!-- <div class="btn-group">
                    <a href="javascript:void(0)" class="btn-solid btn-sm addtocart-btn">Make Payment </a>
                    <a href="javascript:void(0)" class="btn-outline btn-sm wishlist-btn">Add To Wishlist</a>
                  </div> -->
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
                      <p>
                        The Model is wearing a white blouse from our stylist's collection, see the image for a mock-up of what the actual blouse would look like.it has text written on it in a black
                        glass is a heady concoction of madness mixed with a hint of wicked along with several bursts of outrageousness and a tingling spiciness of twisted humour bottled up in
                        intriguing grandeur cursive language which looks great on a white color.
                      </p>

                      <div class="title-box4 mb-3 mt-4">
                        <h4 class="heading mt-0">Comfort: <span class="bg-theme-blue"></span></h4>
                      </div>

                      <p>
                        Glass is a heady concoction of madness mixed with a hint of wicked along with several bursts of wicked along with several bursts outrageousness and a tingling spiciness of
                        twisted humour bottled up in intriguing grandeur
                      </p>

                      <div class="row g-3 g-lg-4 ratio_landscape mb-3">
                        <div class="col-md-4">
                          <div class="frame-wrap">
                            <video class="video-tag" loop autoplay muted>
                              <source src="<?=$dirAsset?>/video/clothing.mp4" type="video/mp4" />
                              <source src="<?=$dirAsset?>/video/clothing.ogg" type="video/ogg" />
                              Your browser does not support the video tag.
                            </video>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="speciation-summery">
                            <ul class="general-summery">
                              <li>
                                <i data-feather="check-circle"></i>
                                <span> Madness mixed with a hint of wicked along</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Tingling spiciness of twisted humour bottled up in intriguing grandeur</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Comfortable and stylish all day long.Indigo shirt with western yoke</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Intriguing grandeur cursive language which looks great on a white color.</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Synthetic fibres like rayon. It's light in weight and is soft </span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Minima possums, pariah's sed, quasi provident dolorous molesting</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <p>
                        Smart rich stretch viscose green yellow poly- blend fabric spaghetti straps figure-skimming fit. Tops shift shape rich fabric relaxed fitting size true black gold zip virgin
                        wool. Stretch lining hemline above knee burgundy satin finish concealed zip small buttons rayon.
                      </p>

                      <div class="title-box4 mb-3 mt-4">
                        <h4 class="heading mt-0">Material Details <span class="bg-theme-blue"></span></h4>
                      </div>
                      <p>
                        Glass is a heady concoction of madness mixed with a hint of wicked along with several bursts of wicked along with several bursts outrageousness and a tingling spiciness of
                        twisted humour bottled up in intriguing grandeur
                      </p>
                      <p>
                        Structured chic panels power party flattering ultimate trim back pencil silhouette perfect look. Best seller signature waist cut pockets cotton-mix navy blue tailoring elegant
                        cashmere. Stretch lining hemline above knee burgundy satin finish concealed zip small buttons rayon. Tops shift shape rich fabric relaxed fitting size true black gold zip
                        virgin wool. Stretch lining hemline above knee burgundy satin finish concealed zip small buttons rayon.
                      </p>
                      <div class="row row g-3 g-lg-4">
                        <div class="col-md-8 order-2 order-md-1">
                          <div class="speciation-summery">
                            <ul class="general-summery">
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Tingling spiciness of twisted humour bottled up in intriguing grandeur</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Comfortable and stylish all day long.Indigo shirt with western yoke</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Intriguing grandeur cursive language which looks great on a white color.</span>
                              </li>
                              <li>
                                <i data-feather="check-circle"></i>
                                <span>Synthetic fibres like rayon. It's light in weight and is soft </span>
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