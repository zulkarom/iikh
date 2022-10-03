<?php 
use yii\helpers\Url;
?>

      <!-- Service Section start -->
      <section class="service-section">
        <div class="container-lg">
          
          <div class="row g-3 g-md-4 g-lg-0">
          <div class="col-6 col-lg-3"></div>
            <div class="col-6 col-lg-3">
              <div class="service-box">
                <div class="media">
                  <svg>
                    <use xlink:href="<?=$dirAsset?>/icons/svg/service/_sprite.svg#truck"></use>
                  </svg>
                  <div class="media-body">
                    <h5>Seluruh Malaysia</h5>
                    <span>Penghantaran ke seluruh Malaysia</span>
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


          </div>
        </div>
      </section>
      <!-- Service Section End -->

<footer class="footer-document ratio_asos mb-xxl">

      <div>
        <div class="container-lg">
          <div class="main-footer">
            <div class="row gy-3 gy-md-4 gy-xl-0">
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="content-box">
                  <img class="logo" src="<?=$dirAsset?>/images/ikhtiar/logo/logo_dark.png" alt="logo-white" />
                  <ul>
                    <li><i data-feather="map-pin"></i> <span> Kota Bharu 16100 Kelantan </span></li>
                    <li>
                      <i data-feather="phone"></i><a class="nav" href="tel:185659635"><span> +601116334296 </span></a>
                    </li>
                    <li>
                      <i data-feather="mail"></i><a class="nav" href="mailto:fashion098@gmail.com"><span> 
                        i.ikhtiarresources@gmail.com </span></a>
                    </li>
                  </ul>
                </div>
              </div>

              <!-- <div class="nav-footer col-lg-2 col-md-4 order-md-3 order-lg-2">
                <div class="nav content-box d-md-block">
                  <h5 class="heading-footer">Shop By</h5>
                  <ul>
                    <li><a class="nav" href="shop-left-sidebar.html">New In </a></li>
                    <li><a class="nav" href="shop-left-sidebar.html">Women </a></li>
                    <li><a class="nav" href="shop-left-sidebar.html">Men </a></li>
                    <li><a class="nav" href="shop-left-sidebar.html">Shoes</a></li>
                    <li><a class="nav" href="shop-left-sidebar.html">Bags & Accessories </a></li>
                    <li><a class="nav" href="shop-left-sidebar.html">Top Brands </a></li>
                  </ul>
                </div>
              </div> -->

              <div class="nav-footer col-xl-3 col-lg-3 col-md-4 order-md-4 order-lg-3">
                <div class="nav d-md-block content-box">
                  <h5 class="heading-footer">Information</h5>
                  <ul>
                    <li><a class="nav" href="<?php echo Url::to(['site/index'])?>">Home </a></li>
                    <li><a class="nav" href="<?php echo Url::to(['page/about'])?><?php echo Url::to(['site/index'])?>">About </a></li>
                    <li><a class="nav" href="<?php echo Url::to(['page/catalog'])?>">Catalog</a></li>
                    <li><a class="nav" href="<?php echo Url::to(['page/be-our-partner'])?>">Be Our Partner </a></li>
                    <li><a class="nav" href="<?php echo Url::to(['page/contact-us'])?>">Contact Us </a></li>
                  </ul>
                </div>
              </div>



              <div class="col-xl-3 col-md-6 col-lg-4 order-md-2 order-lg-5">
                <div class="content-box">
                  <h5 class="heading-footer">Follow Us</h5>
                  <div class="follow-wrap">
                    <ul>
                      <li>
                        <a href="https://www.facebook.com"> <img src="<?=$dirAsset?>/icons/svg/social/fb.svg" alt="fb" /> </a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com"> <img src="<?=$dirAsset?>/icons/svg/social/inta.svg" alt="fb" /> </a>
                      </li>
                      <li>
                        <a href="https://twitter.com"> <img src="<?=$dirAsset?>/icons/svg/social/tw.svg" alt="fb" /> </a>
                      </li>
                      <li>
                        <a href="https://in.pinterest.com/"> <img src="<?=$dirAsset?>/icons/svg/social/pint.svg" alt="fb" /> </a>
                      </li>
                    </ul>
                  </div>

                  <div class="subscribe-box">
                    <h5>Newsletter Sign Up</h5>
                    <p>Receive our latest updates about our products & promotions.</p>
                  </div>

                  <form action="javascript:void(0)" class="footer-form">
                    <input required type="email" class="form-control" placeholder="Your email address" />
                    <button type="submit" class="btn-solid">SUBMIT <i class="arrow"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="sub-footer">
            <div class="row gy-3">
              <div class="col-md-6">
            
              </div>
              <div class="col-md-6">
                <p class="mb-0">© 2022 iikhtiar.com | 2i + Honey | All right reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>