<header class="header-common">
      <!-- Top Header -->
      <div class="top-header">
        <p class="marquee"><span> Summer sale for all swim suits - off 50%! Shop Now</span></p>
      </div>
      <div class="container-lg">
        <div class="nav-wrap">
          <!-- Navigation Start -->
          <nav class="navigation">
            <div class="nav-section">
              <div class="header-section">
                <div class="navbar navbar-expand-xl navbar-light navbar-sticky p-0">
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu" aria-controls="primaryMenu">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <a href="index.html" class="logo-link">
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
                        <li class="nav-item dropdown dropdown-mega">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Home</a>
                          
                        </li>

                        <!-- Shop -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About</a>
                          
                        </li>

                        <!-- Product -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Catalog</a>
                          
                        </li>

                        <!-- Oslo Plus -->
                        <li class="nav-item dropdown dropdown-mega">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Be our partner</a>
                          
                        </li>

                        <!-- Pages -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Contact Us</a>
                          
                        </li>

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
            <div class="select-menu">
              <div class="dropdown select-dropdown">
                <button id="unitSelected"><span>USD</span> <i data-feather="chevron-down"></i></button>
                <ul class="onhover-show-div">
                  <li class="unit">USD</li>
                  <li class="unit">EUR</li>
                  <li class="unit">INR</li>
                  <li class="unit">CNY</li>
                </ul>
              </div>
              <div class="dropdown select-dropdown" id="translate">
                <button id="languageSelected"><span>English</span> <i data-feather="chevron-down"></i></button>
                <ul class="onhover-show-div">
                  <li class="lang">English</li>
                  <li class="lang">Chinese</li>
                  <li class="lang">Arabic</li>
                  <li class="lang">Russian</li>
                </ul>
              </div>
            </div>

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
                      <li>
                        <div class="product-cart media">
                          <img src="<?=$dirAsset?>/images/fashion/product/front/4.jpg" class="img-fluid blur-up lazyload" alt="" />
                          <div class="media-body">
                            <a href="javascript:void(0)">
                              <h6>Women’s long sleeve Jacket</h6>
                            </a>
                            <ul class="rating p-0 mb">
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
                                <i data-feather="star"></i>
                              </li>
                            </ul>
                            <p class="mb-0 mt-1">$280.00</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="product-cart media">
                          <img src="<?=$dirAsset?>/images/fashion/product/front/5.jpg" class="img-fluid blur-up lazyload" alt="" />
                          <div class="media-body">
                            <a href="javascript:void(0)">
                              <h6>Shirt short mini dresses</h6>
                            </a>
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
                                <i data-feather="star"></i>
                              </li>
                            </ul>
                            <p class="mb-0 mt-1">$35.00</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- Suggestion Start -->
                </div>
                <!-- Search Input End -->
              </li>

              <li class="user">
                <div class="dropdown user-dropdown">
                  <a href="javascript:void(0)"><i data-feather="user"></i></a>
                  <ul class="onhover-show-div">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                  </ul>
                </div>
              </li>

              <li>
                <div class="dropdown whislist-dropdown">
                  <a href="javascript:void(0)"><i data-feather="heart"></i> <span class="notification-label">0</span></a>
                  <div class="onhover-show-div">
                    <a href="wishlist.html"> <img src="<?=$dirAsset?>/icons/svg/box.svg" class="img-fluid" alt="box" /> </a>
                    <div class="content">
                      <a href="wishlist.html">
                        <h6>Your wishlist empty !!</h6>
                        <p>explore more and shortlist items.</p>
                      </a>
                    </div>
                  </div>
                </div>
              </li>

              <!-- Cart Menu Start -->
              <li>
                <div class="dropdown shopingbag">
                  <a href="javascript:void(0)" class="cart-button"><i data-feather="shopping-bag"></i> <span class="notification-label">3</span></a>
                  <a href="javascript:void(0)" class="overlay-cart overlay-common"></a>
                  <div class="onhover-cart-dropdown">
                    <div class="onhover-show-div">
                      <div class="dropdown-header">
                        <div class="control">
                          <a href="cart.html">Shopping Cart</a>
                          <button class="back-cart"><i data-feather="arrow-right"></i></button>
                        </div>
                      </div>

                      <div class="card-wrap custom-scroll">
                        <!-- Cart Item Start -->
                        <div class="cart-card media">
                          <a href="product.html"> <img src="<?=$dirAsset?>/images/fashion/product/front/8.jpg" class="img-fluid" alt="product" /> </a>
                          <div class="media-body">
                            <a href="product.html"> <h6>Concrete Jungle Pack</h6></a>
                            <span>$120.00</span>
                            <div class="plus-minus">
                              <i class="sub" data-feather="minus"></i>
                              <input type="number" value="1" min="1" max="10" />
                              <i class="add" data-feather="plus"></i>
                            </div>
                          </div>
                          <button class="remove-cart"><i data-feather="x"></i></button>
                        </div>
                        <!-- Cart Item End -->

                        <!-- Cart Item Start -->
                        <div class="cart-card media">
                          <a href="product.html"> <img src="<?=$dirAsset?>/images/fashion/product/front/9.jpg" class="img-fluid" alt="product" /> </a>
                          <div class="media-body">
                            <a href="product.html"> <h6>Concrete Jungle Pack</h6></a>
                            <span>$120.00</span>
                            <div class="plus-minus">
                              <i class="sub" data-feather="minus"></i>
                              <input type="number" value="1" min="1" max="10" />
                              <i class="add" data-feather="plus"></i>
                            </div>
                          </div>
                          <button class="remove-cart"><i data-feather="x"></i></button>
                        </div>
                        <!-- Cart Item End -->

                        <!-- Cart Item Start -->
                        <div class="cart-card media">
                          <a href="product.html"> <img src="<?=$dirAsset?>/images/fashion/product/front/7.jpg" class="img-fluid" alt="product" /> </a>
                          <div class="media-body">
                            <a href="product.html"> <h6>Concrete Jungle Pack</h6></a>
                            <span>$120.00</span>
                            <div class="plus-minus">
                              <i class="sub" data-feather="minus"></i>
                              <input type="number" value="1" min="1" max="10" />
                              <i class="add" data-feather="plus"></i>
                            </div>
                          </div>
                          <button class="remove-cart"><i data-feather="x"></i></button>
                        </div>
                        <!-- Cart Item End -->
                      </div>
                      <div class="dropdown-footer">
                        <div class="freedelevery">
                          <p class="terms-condition">FREE SHIPPING! Continue Shopping to add more product to you cart and receive free shipping for orders over <strong>$500</strong></p>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
                          </div>
                        </div>
                        <div class="total-price">
                          <span>Total</span>
                          <span>$450</span>
                        </div>

                        <div class="btn-group block-group">
                          <a href="cart.html" class="btn-solid">View Cart</a>
                          <a href="payment.html" class="btn-outline">Checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Cart Menu End -->
            </ul>
            <!-- Icon Menu End -->
          </div>
          <!-- Menu Right End  -->
        </div>
      </div>
    </header>
