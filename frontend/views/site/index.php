<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use backend\modules\shop\models\Product;

$this->title = 'Ikhtiar';
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');

$product = Product::findOne(1);

$urlHome = Url::to(['/product/index']);
?>
<style type="text/css">

  .blog-box.blog-list .img-box {
     width: 100%; 
}
</style>
<?php 
$ayat = 'Sihat itu bukanlah suatu kemewahan. Sihat itu murah, namun menjadi mahal ketika sihat telah berubah menjadi sakit. Peliharalah kesihatan anda, kerana ia yang akan mewadahi umur panjang anda.';
?>
<main class="main">
      <!-- Home Banner Section Start -->
      <section class="home-slider-common ratio_40 p-0">
        <div class="swiper home-slider">
          <div class="swiper-wrapper">
            <!-- Slide Start -->

   
            <div class="swiper-slide">
              <div class="banner">
                <div>
                  <img class="bg-img img-fluid" src="<?=$dirAsset?>/images/fashion/banner/banner1.jpg" alt="banner" />
                </div>


                <div class="content-box">
             
                  <h1 class="heading" style="text-transform:inherit">
                    JOM <strong> AMALKAN</strong> <span> 2i+HONEY <img class="shape" src="<?=$dirAsset?>/svg/shape.svg" alt="shape"></span> UNTUK HIDUP <strong>SIHAT</strong>
                  </h1>
       
                  <p><?=$ayat?></p>
                  <a href="<?=$urlHome?>" class="btn-style3">PESAN SEKARANG <i class="arrow"></i></a>
 
                </div>

                <!-- Banner Image Right -->
                <!-- <img class="img-fluid banner-right-img" src="<?=$dirAsset?>/images/fashion/slider/banner1-2.png" alt="" /> -->


                <!-- Card Box Start -->
              </div>
            </div>
            <!-- Slide End -->

            <div class="swiper-slide">
              <div class="banner">
                <div>
                  <img class="bg-img img-fluid" src="<?=$dirAsset?>/images/fashion/banner/banner1.jpg" alt="banner" />
                </div>


                <div class="content-box">
             
                  <h1 class="heading" style="text-transform:inherit">
                    JOM <strong> AMALKAN</strong> <span> 2i+HONEY <img class="shape" src="<?=$dirAsset?>/svg/shape.svg" alt="shape"></span> UNTUK HIDUP <strong>SIHAT</strong>
                  </h1>
       
                  <p><?=$ayat?></p>
                  <a href="<?=$urlHome?>" class="btn-style3">PESAN SEKARANG <i class="arrow"></i></a>
 
                </div>

                <!-- Banner Image Right -->
                <!-- <img class="img-fluid banner-right-img" src="<?=$dirAsset?>/images/fashion/slider/banner1-2.png" alt="" /> -->


                <!-- Card Box Start -->
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <!-- Home Banner Section End -->

   

   

      <!-- Detail Card Section Start -->
      <section class="detail-card-section ratio_asos pb-0 wow-section-overflow">
        <div class="container-lg">
          <div class="top-heading">
            <p><h4><strong>Amalkan <?=$product->name?> Untuk Hidup Sihat</strong></h4></p>
            <!-- <span>Ralph Lauren</span> -->
          </div>
          <div class="row gy-4 g-2 g-sm-3 g-xl-4">
            <div class="col-6 col-md-4 col-lg-4 span3 wow fadeInUp" data-wow-delay="0.3s">
              <div class="detail-card">
                <div class="img-wrap">
                  <a href="shop-left-sidebar.html"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/info/1.png" alt="product" /></a>
                </div>
                <div class="content-box">
                  <a href="shop-left-sidebar.html">
                    <!-- <h3>Standard-fit sleeveless midi dress</h3> -->
                    <p>2i+Honey adalah produk pemakanan kesihatan yang diasaskan oleh saudara Ikmalul Iktimam hasil daripada pengalaman beliau sendiri yang mengalami masalah kesihatan yang menyebabkan beliau terpaksa berkerusi roda selama hampir 7 tahun.</p></a
                  >
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 span3 wow fadeInUp" data-wow-delay="0.4s">
              <div class="detail-card">
                <div class="img-wrap">
                  <a href="shop-left-sidebar.html"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/info/2.png" alt="product" /></a>
                </div>
                <div class="content-box">
                  <a href="shop-left-sidebar.html">
                    <!-- <h3>Casual Indigo Blue Jeans Jacket</h3> -->
                    <p>2i+Honey terdiri daripada campuran bahan asli madu tualang, pati delima, minyak habbatus’sauda dan minyak zaitun telah diamalkan oleh saudara Ikmalul Iktimam sebagai supplement hariannya sehingga beliau kini pulih sepenuhnya kembali, dengan izin Allah.</p></a
                  >
                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 col-lg-4 span3 wow fadeInUp" data-wow-delay="0.5s">
              <div class="detail-card">
                <div class="img-wrap">
                  <a href="shop-left-sidebar.html"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/info/3.png" alt="product" /></a>
                </div>
                <div class="content-box">
                  <a href="shop-left-sidebar.html">
                    <!-- <h3>Montes Loremous A Cosmopolite</h3> -->
                    <p>Kini, beliau ingin berkongsi manfaat produk <?=$product->name?> ini bagi membantu orang ramai yang mempunyai masalah kesihatan untuk turut sama merasai nikmat hidup yang sihat.
</p></a
                  >
                </div>
              </div>
            </div>

        </div>
      </section>
      <!-- Detail Card Section End -->

      <!-- Top Product Section Start -->
      <section class="pb-0">
        <div class="container-lg">
          <div class="title-box">
            <h2 class="unique-heading">KANDUNGAN UTAMA 2i+HONEY</h2>
            <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
    
          </div>

          <!-- Tabs Start -->
          <div class="nav-tabs-star">
            <!-- Tabs Filter Start -->
            
            <!-- Tabs Filter End -->

            <!-- Tab Content Start -->
            <div class="row">
              <div class="col-6">
                <div class="tab-content ratio_asos" id="pills-tabContent">
                  <div class="blog-box blog-list">
                      <a href="blog-detail.html" class="img-box bg-size" style="
                        background-image: url(<?=$dirAsset?>/images/ikhtiar/madu.png);
                        background-size:cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: 100%;
                        display: block;
                        ">
                        <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/madu.png" alt="blog" style="display: none;">
                      </a>
                      <div class="content-box">
                        
                        <a href="blog-detail.html"> <h5 class="truncate">MADU TUALANG</h5> </a>
                        <a href="blog-detail.html">
                          <p class="">
                            Berperanan sebagai antioksida dalam badan untuk menghapuskan bahan-bahan radikal yang menjadi penyebab kepada penyakit kronik dan mengelakkan jangkitan bakteria.
                          </p>
                        </a>

                        
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <div class="tab-content ratio_asos" id="pills-tabContent">
                  <div class="blog-box blog-list">
                      <a href="blog-detail.html" class="img-box bg-size" style="
                        background-image: url(<?=$dirAsset?>/images/ikhtiar/habatus.png);
                        background-size:cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: 100%;
                        display: block;
                        ">
                        <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/habatus.png" alt="blog" style="display: none;">
                      </a>
                      <div class="content-box">
                        
                        <a href="blog-detail.html"> <h5 class="truncate">MINYAK HABBATUS'SAUDA</h5> </a>
                        <a href="blog-detail.html">
                          <p class="">
                            Sumber tenaga dan membantu memulihkan tubuh badan dari mengalami keletihan. Merawat masalah pernafasan, asthma, gastrik, luka dalaman dan melawan serangan virus pada sistem tubuh.
                          </p>
                        </a>

                        
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="col-6">
                <div class="tab-content ratio_asos" id="pills-tabContent">
                  <div class="blog-box blog-list">
                      <a href="blog-detail.html" class="img-box bg-size" style="
                        background-image: url(<?=$dirAsset?>/images/ikhtiar/delima.png);
                        background-size:cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: 100%;
                        display: block;
                        ">
                        <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/delima.png" alt="blog" style="display: none;">
                      </a>
                      <div class="content-box">
                        
                        <a href="blog-detail.html"> <h5 class="truncate">PATI DELIMA</h5> </a>
                        <a href="blog-detail.html">
                          <p class="">
                            Meningkatkan kandungan hemoglobin di dalam darah. Disyorkan bagi mereka yang menghidap anemia, darah tinggi, masalah jantung dan mengalami masalah pada sistem urinary.
                          </p>
                        </a>

                        
                      </div>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <div class="tab-content ratio_asos" id="pills-tabContent">
                  <div class="blog-box blog-list">
                      <a href="blog-detail.html" class="img-box bg-size" style="
                        background-image: url(<?=$dirAsset?>/images/ikhtiar/zaitun.png);
                        background-size:cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: 100%;
                        display: block;
                        ">
                        <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/zaitun.png" alt="blog" style="display: none;">
                      </a>
                      <div class="content-box">
                        
                        <a href="blog-detail.html"> <h5 class="truncate">MINYAK ZAITUN</h5> </a>
                        <a href="blog-detail.html">
                          <p class="">
                            Sumber tenaga dan membantu memulihkan tubuh badan dari mengalami keletihan. Merawat masalah pernafasan, asthma, gastrik, luka dalaman dan melawan serangan virus pada sistem tubuh.
                          </p>
                        </a>

                        
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Tab Content End -->
          </div>
          <!-- Tabs End -->
        </div>
      </section>
      <!-- Top Product Section End -->

      <!-- New Arrived Section Start -->
      <section class="pb-0 ratio_asos">
        <div class="container-lg">
          <div class="title-box">
            <h2 class="unique-heading">PRODUK</h2>
            <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
            <p><?=$product->name?> terdiri daripada campuran bahan asli madu tualang, pati delima, minyak habbatus’sauda dan minyak zaitun</p>
          </div>

          <div class="swiper product-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="product-card">
                  <div class="img-box">
                    <!-- Thumbnail -->
                    <ul class="thumbnail-img">
                      <li class=""><a href="<?=$urlHome?>"><h4>Quick Buy</h4></a></li>
                    </ul>

                    <a href="<?=$urlHome?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-1.jpg" alt="product" /> </a>

                  
                  </div>                  
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <div class="img-box">
                    <!-- Thumbnail -->
                    <ul class="thumbnail-img">
                      <li class=""><a href="<?=$urlHome?>"><h4>Quick Buy</h4></a></li>
                    </ul>

                    <a href="<?=$urlHome?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-2.jpg" alt="product" /> </a>

                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <div class="img-box">
                    <!-- Thumbnail -->
                    <ul class="thumbnail-img">
                      <li class=""><a href="<?=$urlHome?>"><h4>Quick Buy</h4></a></li>
                    </ul>

                    <a href="<?=$urlHome?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="product" /> </a>

                  </div>

                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <div class="img-box">
                    <!-- Thumbnail -->
                    <ul class="thumbnail-img">
                      <li class=""><a href="<?=$urlHome?>"><h4>Quick Buy</h4></a></li>
                    </ul>

                    <a href="<?=$urlHome?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-4.jpg" alt="product" /> </a>

                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div class="product-card">
                  <div class="img-box">
                    <!-- Thumbnail -->
                    <ul class="thumbnail-img">
                      <li class=""><a href="<?=$urlHome?>"><h4>Quick Buy</h4></a></li>
                    </ul>

                    <a href="<?=$urlHome?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-2.jpg" alt="product" /> </a>

                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- New Arrived Section End -->

      <!-- Service Section start -->
      <section class="service-section">
        <div class="container-lg">
          <div class="row g-3 g-md-4 g-lg-0">
            <div class="col-6 col-lg-3">
              <div class="service-box">
                <div class="media">
                  <svg>
                    <use xlink:href="<?=$dirAsset?>/icons/svg/service/_sprite.svg#truck"></use>
                  </svg>
                  <div class="media-body">
                    <h5>Free Shipping</h5>
                    <span>From all orders over $200</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="service-box">
                <div class="media">
                  <svg>
                    <use xlink:href="<?=$dirAsset?>/icons/svg/service/_sprite.svg#component"></use>
                  </svg>
                  <div class="media-body">
                    <h5>FREE RETURNS</h5>
                    <span>Return money within 30 days</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="service-box">
                <div class="media">
                  <svg>
                    <use xlink:href="<?=$dirAsset?>/icons/svg/service/_sprite.svg#dollar"></use>
                  </svg>
                  <div class="media-body">
                    <h5>SECURE SHOPPING</h5>
                    <span>You're in safe hands</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-lg-3">
              <div class="service-box">
                <div class="media">
                  <svg>
                    <use xlink:href="<?=$dirAsset?>/icons/svg/service/_sprite.svg#thum"></use>
                  </svg>
                  <div class="media-body">
                    <h5>OVER 10,000 STYLES</h5>
                    <span>We have everything you need</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Service Section End -->
    </main>
