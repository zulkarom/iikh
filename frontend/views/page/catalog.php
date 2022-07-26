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