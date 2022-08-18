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
$ayat = '';

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
                  <img class="bg-img img-fluid" src="<?=$dirAsset?>/images/ikhtiar/banner1.png" alt="banner" />
                </div>


                <div class="content-box">
             
                  <h1 class="heading" style="text-transform:inherit">
                    JADIKAN <span> 2i+HONEY <img class="shape" src="<?=$dirAsset?>/svg/shape.svg" alt="shape"></span> <strong>PEMAKANAN TAMBAHAN</strong> HARIAN ANDA
                  </h1>
       
                  <p><?=$ayat?></p>
                  <a href="<?=$urlHome?>" class="btn-style3">ORDER NOW <i class="arrow"></i></a>
 
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
                  <img class="bg-img img-fluid" src="<?=$dirAsset?>/images/ikhtiar/banner1.png" alt="banner" />
                </div>


                <div class="content-box">
             
                  <h1 class="heading" style="text-transform:inherit">
                    JOM <strong> AMALKAN</strong> <span> 2i+HONEY <img class="shape" src="<?=$dirAsset?>/svg/shape.svg" alt="shape"></span> UNTUK HIDUP <strong>SIHAT</strong>
                  </h1>
       
                  <p><?=$ayat?></p>
                  <a href="<?=$urlHome?>" class="btn-style3">ORDER NOW <i class="arrow"></i></a>
 
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
      
<section id="supplement" class="services-area pt-110 pb-120">
    <div class="container">



          <div class="title-box">
            <h2 class="unique-heading">KHASIAT</h2>
            <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
            <p>Amalkan 2i+HONEY untuk hidup yang sihat</p>
          </div>
    

        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="single-delivery-services mb-70 pr-40">
                    <div class="ds-icon order-0 order-md-2">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/sugar.svg" alt="...">
                    </div>
                    <div class="ds-content text-center text-sm-left text-md-right">
                        <h5>Mengawal kolestrol & gula</h5>
                        <p>Mengawal kandungan kolestrol dan gula dalam darah</p>
                    </div>
                </div>
                <div class="single-delivery-services mb-70 pr-40">
                    <div class="ds-icon order-0 order-md-2">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/heart.svg" alt="...">
                    </div>
                    <div class="ds-content text-center text-sm-left text-md-right">
                        <h5>Menjaga Jantung & Saraf</h5>
                        <p>Menjaga Kesihatan jantung dan saraf</p>
                        
                    </div>
                </div>
                <div class="single-delivery-services mb-70 pr-40">
                    <div class="ds-icon order-0 order-md-2">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/virus.svg" alt="...">
                    </div>
                    <div class="ds-content text-center text-sm-left text-md-right">
                        <h5>Mencegah Bakteria & Virus</h5>
                        <p>Mencegah jangkitan bakteria dan virus pada sistem tubuh</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 d-none d-xl-block">
                <div class="d-services-img">
                    <img src="<?=$dirAsset?>/images/ikhtiar/khasiat.png" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="single-delivery-services mb-70 pl-40">
                    <div class="ds-icon">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/orange.svg" alt="...">
                    </div>
                    <div class="ds-content">
                        <h5>Tinggi Antioksida</h5>
                        <p>Tinggi antioksida bagi menjaga sistem tubuh </p>
                    </div>
                </div>
                <div class="single-delivery-services mb-70 pl-40">
                    <div class="ds-icon">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/lungs.svg" alt="...">
                    </div>
                    <div class="ds-content">
                        <h5>Merawat Sistem Pernafasan</h5>
                        <p>Merawat masalah sistem pernafasan (Asma), gastrik & luka dalaman</p>
                    </div>
                </div>
                <div class="single-delivery-services mb-70 pl-40">
                    <div class="ds-icon">
                    <img width="40" src="<?=$dirAsset?>/icons/svg/stomach.svg" alt="...">
                    </div>
                    <div class="ds-content">
                        <h5>Melancarkan Sistem Penghadaman</h5>
                        <p>Melancarkan sistem penghadaman & pencernaan (sembelit)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
      <!-- Detail Card Section End -->


      <div class="sub-banner section-t-space ratio_asos">
        <div class="sub-banner bg-size" style="
        background-image: url(<?=$dirAsset?>/images/ikhtiar/banner2.png);
        background-size:cover;
        background-position: center;
        background-repeat: no-repeat;
        display: block;
        ">
          <img class="bg-img img-fluid" src="<?=$dirAsset?>/images/ikhtiar/banner2.png" alt="banner" style="display: none;">

          <div class="content-box" style="left:65%">
            <div class="heading-wrap">
              <span class="span-1">2i+HONEY</span>
              <span class="span-2">hidup </span>
              <span class="span-3">sihat</span>

            </div>
            <a href="<?=Url::to(['product/index'])?>" style="margin-top:22px" class="site-button">Buy Now
            </a>
          </div>


        </div>
      </div>

      <!-- Top Product Section Start -->
      <section class="pb-0">
        <div class="container-lg">
          <div class="title-box">
            <h2 class="unique-heading">KANDUNGAN UTAMA</h2>
            <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
    
          </div>

          <!-- Tabs Start -->
          <div class="nav-tabs-star">
            <!-- Tabs Filter Start -->
            
            <!-- Tabs Filter End -->

            <!-- Tab Content Start -->
            <div class="row">
              <div class="col-md-6">
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
              <div class="col-md-6">
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
              <div class="col-md-6">
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
              <div class="col-md-6">
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
                      <li class=""><a href="<?=$urlHome?>"><h4>Buy Now</h4></a></li>
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
                      <li class=""><a href="<?=$urlHome?>"><h4>Buy Now</h4></a></li>
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
                      <li class=""><a href="<?=$urlHome?>"><h4>Buy Now</h4></a></li>
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
                      <li class=""><a href="<?=$urlHome?>"><h4>Buy Now</h4></a></li>
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
                      <li class=""><a href="<?=$urlHome?>"><h4>Buy Now</h4></a></li>
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


    </main>
