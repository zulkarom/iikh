<?php 
use yii\helpers\Url;
?>

<header class="header-common">
      <!-- Top Header -->
      <div class="top-header">
        <p class="marquee"><span> Amalkan 2i+Honey Untuk Hidup Sihat | 2i+Honey terdiri daripada campuran bahan asli madu tualang, pati delima, minyak habbatus’sauda dan minyak zaitun</span></p>
      </div>
      <div class="container-lg">
        <div class="nav-wrap">
          <!-- Navigation Start -->
          <nav class="navigation">
            <div class="nav-section">
              <div class="header-section">
                <div class="navbar navbar-expand-xl navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu" aria-controls="primaryMenu">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a href="<?php echo Url::to(['site/index'])?>" class="logo-link">
                    <img class="logo logo-dark" src="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" alt="logo" />
                    <img class="logo logo-light" src="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" alt="logo" />
                  </a>
                  <div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
                    <div class="offcanvas-header navbar-shadow">
                      <h5 class="mt-1 mb-0">Menu</h5>
                      <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                      <!-- Menu-->
                      <ul class="navbar-nav">
                        <!-- Home -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?php echo Url::to(['site/index'])?>">Home</a>
                          
                        </li>

            

                        <!-- Product -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?=Url::to(['/page/catalog'])?>">2i+HONEY</a>
                          
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?=Url::to(['/product/index'])?>">Order</a>
                          
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="<?=Url::to(['/page/contact-us'])?>">Contact Us</a>
                          
                        


                      


                       

                          </li>



                        <?php
                        $icon = '';
                        if (!Yii::$app->user->isGuest) {
                          $icon = '<i data-feather="user"></i> ';
                        }
                        
                        ?>
  

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><?=$icon?>MEMBER</a>
                          <div class="dropdown-menu">
                            <div class="dropdown-column">

                            <?php  if (!Yii::$app->user->isGuest) {?>

                              <a class="dropdown-item" href="<?=Url::to(['/dashboard/index'])?>">DASHBOARD</a>
                              <a class="dropdown-item" href="<?=Url::to(['/site/logout'])?>">LOG OUT</a>

                              <?php } else { ?>

                                <a class="dropdown-item" href="<?=Url::to(['/site/login'])?>">LOG IN</a>

                                <a class="dropdown-item" href="<?=Url::to(['/site/signup'])?>">REGISTER</a>


                                <?php }  ?>
                            </div>
                          </div>
                        </li>


                     

                        <!-- Pages -->
                  

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
          <!-- Navigation End -->

          <!-- Menu Right Start  -->
          <div class="menu-right">

            <!-- Icon Menu Start -->
            <ul class="icon-menu">
              <li>
                <button class="search-button"><i data-feather="search"></i></button>
                <!-- Search Input Start -->
                <div class="search-full">
                  <div class="input-group">
                    <span class="input-group-text">
                      <i data-feather="search"></i>
                    </span>
                    <input type="text" class="form-control search-type" placeholder="Search here.." />
                    <span class="input-group-text close-search">
                      <i data-feather="x"></i>
                    </span>
                  </div>

                  <!-- Suggestion Start -->
                  <div class="search-suggestion">
                    <ul>
  

                    </ul>
                  </div>
                  <!-- Suggestion Start -->
                </div>
                <!-- Search Input End -->
              </li>





    
            </ul>
            <!-- Icon Menu End -->
          </div>
          <!-- Menu Right End  -->
        </div>
      </div>
    </header>
