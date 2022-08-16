<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');

$urlHome = Url::to(['/product/index']);
?>

<div class="breadcrumb-wrap">
  <div class="banner">
    <img class="bg-img bg-top" src="<?=$dirAsset?>/images/inner-page/banner-p.jpg" />
    <div class="container-lg">
      <div class="breadcrumb-box">
        <div class="heading-box">
          <h1>Catalog</h1>
        </div>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li>
            <a href="<?php echo Url::to(['/site/home'])?>"><i data-feather="chevron-right"></i></a>
          </li>
          <li class="current"><a href="javascript:void(0)">Catalog</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- New Arrived Section Start -->
      <section class="pb-0 ratio_asos">
        <div class="container-lg">
          <div class="title-box">
            <h2 class="unique-heading">PRODUK</h2>
            <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
            <p>2i+Honey terdiri daripada campuran bahan asli madu tualang, pati delima, minyak habbatus’sauda dan minyak zaitun</p>
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
