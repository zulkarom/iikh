<?php
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Negeri;
use yii\helpers\Html;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

<section class="user-dashboard">
        <div class="container-lg">
          <div class="row g-3 g-xl-4 tab-wrap">
            <div class="col-lg-4 col-xl-3 sticky">
              <button class="setting-menu btn-solid btn-sm d-lg-none">Setting Menu <i class="arrow"></i></button>
              <div class="side-bar">
                <span class="back-side d-lg-none"> <i data-feather="x"></i></span>
                <div class="profile-box">
                  <div class="img-box">
                    <img class="img-fluid" src="<?=$dirAsset?>/images/avatar/avatar.jpg" alt="user" />
                    <div class="edit-btn">
                      <i data-feather="edit"></i>
                      <input class="updateimg" type="file" name="img" />
                    </div>
                  </div>

                  <div class="user-name">
                    <h5><?=Yii::$app->user->identity->fullname?></h5>
                    <h6><?=Yii::$app->user->identity->email?></h6>
                  </div>
                </div>

                <ul class="nav nav-tabs nav-tabs2" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">
                      Dashboard
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                      Orders
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                      Profile
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-8 col-xl-9">
              <div class="right-content tab-content" id="myTabContent">
                <!-- User Dashboard Start -->
                <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                  <div class="dashboard-tab">
                    <div class="title-box3">
                      <h3>Selamat Kembali <?=Yii::$app->user->identity->fullname?></h3>
                      <p>
                        Welcome back <?=Yii::$app->user->identity->fullname?>, here you can customize your profile and also track your order also, you can access your saved address and card. if you want change setting you can
                        do it from here
                      </p>
                    </div>

                    <div class="row g-0 option-wrap">
                      <div class="col-sm-6 col-xl-4">
                        <a href="javascript:void(0)" data-class="orders" class="tab-box">
                          <img src="<?=$dirAsset?>/icons/svg/1.svg" alt="shopping bag" />
                          <h5>Orders</h5>
                          <p>See order history of previous orders</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="javascript:void(0)" data-class="profile" class="tab-box">
                          <img src="<?=$dirAsset?>/icons/svg/5.svg" alt="profile" />
                          <h5>Profile</h5>
                          <p>Complete your profile details there are some Information missing</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- User Dashboard End -->

                <!-- Order Tabs Start -->
                <div class="tab-pane" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                  <div class="cart-wrap order-content">
                    <div class="title-box3">
                      <h3>My Orders</h3>
                      <p>H thanks for placing a delivery order with Oslo! Your order should be home with you in soon</p>
                    </div>

                    <div class="order-wraper">
                      <div class="order-box">
                        <div class="order-header">
                          <span><i data-feather="box"></i></span>
                          <div class="order-content">
                            <h5 class="order-status success">Delivered</h5>
                            <p>Place July 15 2022 and Delivered on July 18 2022</p>
                          </div>
                        </div>

                        <div class="order-info">
                          <div class="product-details" data-productDetail="product-detail">
                            <div class="img-box"><img src="<?=$dirAsset?>/images/fashion/product/front/4.jpg" alt="product" /></div>
                            <div class="product-content">
                              <h5>Women’s long sleeve Jacket</h5>
                              <p class="truncate-3">
                                Versatile sporty slogans short sleeve quirky laid back orange lux hoodies vests pins badges. Versatile sporty slogans short sleeve quirky laid back orange lux hoodies
                                vests pins badges. Cutting edge crops stone transparent.
                              </p>
                              <span>Prize : <span>$120.00</span></span>
                              <span>Size : <span>M</span></span>
                              <span>Order Id : <span>edf125qa1d35</span></span>
                            </div>
                          </div>

                          <div class="rating-box">
                            <span>Rate Product : </span>
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
                          </div>
                        </div>
                      </div>

                      <div class="order-box">
                        <div class="order-header">
                          <span><i data-feather="box"></i></span>
                          <div class="order-content">
                            <h5 class="order-status success">Delivered</h5>
                            <p>Place July 15 2022 and Delivered on July 18 2022</p>
                          </div>
                        </div>

                        <div class="order-info">
                          <div class="product-details" data-productDetail="product-detail">
                            <div class="img-box"><img src="<?=$dirAsset?>/images/fashion/product/front/5.jpg" alt="product" /></div>
                            <div class="product-content">
                              <h5>Women’s long sleeve Jacket</h5>
                              <p class="truncate-3">
                                Tunic knitted stretch leather spaghetti straps triangle top patterned panelled purple blush. Versatile sporty slogans short sleeve quirky laid back orange lux hoodies
                                vests pins badges.
                              </p>
                              <span>Prize : <span>$120.00</span></span>
                              <span>Size : <span>M</span></span>
                              <span>Order Id : <span>edf125qa1d35</span></span>
                            </div>
                          </div>

                          <div class="rating-box">
                            <span>Rate Product : </span>
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
                          </div>
                        </div>
                      </div>

                      <div class="order-box">
                        <div class="order-header">
                          <span><i data-feather="box"></i></span>
                          <div class="order-content">
                            <h5 class="order-status success">Delivered</h5>
                            <p>Place July 15 2022 and Delivered on July 18 2022</p>
                          </div>
                        </div>

                        <div class="order-info">
                          <div class="product-details" data-productDetail="product-detail">
                            <div class="img-box"><img src="<?=$dirAsset?>/images/fashion/product/front/6.jpg" alt="product" /></div>
                            <div class="product-content">
                              <h5>Women’s long sleeve Jacket</h5>
                              <p class="truncate-3">
                                Pop top sporty stripe trims mesh inserts denim turtle neck casual white cotton button silver.Back print tattoo graphics printed expensive photos colors sun psychedelic
                                super casual tag.
                              </p>
                              <span>Prize : <span>$120.00</span></span>
                              <span>Size : <span>M</span></span>
                              <span>Order Id : <span>edf125qa1d35</span></span>
                            </div>
                          </div>

                          <div class="rating-box">
                            <span>Rate Product : </span>
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
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Order Tabs End -->

                <!-- Order Detail Tab Start -->
                <div class="tab-pane" id="orders-details" role="tabpanel" aria-labelledby="orders-details">
                  <div class="order-detail-wrap order-content">
                    <div class="row g-3 g-md-4">
                      <div class="col-12">
                        <div class="order-summery-wrap mt-0 order-data">
                          <div class="banner-box">
                            <div class="media">
                              <div class="img">
                                <i data-feather="package"></i>
                              </div>
                              <div class="media-body">
                                <h2>Order Delivered</h2>
                                <span class="font-sm">Delivered On July 15 2022</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="product-details">
                          <div class="img-box"><img src="<?=$dirAsset?>/images/fashion/product/front/4.jpg" alt="product" /></div>
                          <div class="product-content">
                            <h5>Women’s long sleeve Jacket</h5>
                            <p class="truncate-3">
                              Versatile sporty slogans short sleeve quirky laid back orange lux hoodies vests pins badges. Versatile sporty slogans short sleeve quirky laid back orange lux hoodies
                              vests pins badges. Cutting edge crops stone transparent.
                            </p>
                            <span>Prize : <span>$120.00</span></span>
                            <span>Size : <span>M</span></span>
                            <span>Order Id : <span>edf125qa1d35</span></span>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="order-data summery-wrap">
                          <div class="order-summery-box">
                            <h5 class="cart-title">Price Details (1 Quantity)</h5>
                            <ul class="order-summery">
                              <li>
                                <span>Bag total</span>
                                <span>$220.00</span>
                              </li>

                              <li>
                                <span>Bag savings</span>
                                <span class="theme-color">-$20.00</span>
                              </li>

                              <li>
                                <span>Coupon Discount</span>
                                <a href="offer.html" class="font-danger">$120.00</a>
                              </li>

                              <li>
                                <span>Delivery</span>
                                <span>$50.00</span>
                              </li>

                              <li class="pb-0">
                                <span>Total Amount</span>
                                <span>$270.00</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="row gy-3 gy-sm-0 g-3 g-md-4">
                          <div class="col-sm-6">
                            <div class="order-data general-details">
                              <!-- Payment Method Start -->
                              <div class="payment-method mt-0">
                                <h5 class="cart-title">Payment Method</h5>
                                <div class="payment-box">
                                  <img src="<?=$dirAsset?>/icons/png/1.png" alt="card" />
                                  <span class="font-sm title-color"> **** **** **** 6502</span>
                                </div>
                              </div>
                              <!-- Payment Method End -->

                              <button class="btn-solid mb-line btn-sm mt-4">Get Invoice <i class="arrow"></i></button>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div class="order-data general-details">
                              <!-- Contact Start -->
                              <div class="payment-method mt-0">
                                <h5 class="cart-title">Contact Us</h5>

                                <div class="payment-box">
                                  <i data-feather="phone"></i>
                                  <span class="font-sm title-color">
                                    <a class="content-color fw-500" href="tel:2554-4454-5646">2554-4454-5646</a>
                                  </span>
                                </div>

                                <div class="payment-box mt-3">
                                  <i data-feather="phone"></i>
                                  <span class="font-sm title-color">
                                    <a class="content-color fw-500" href="tel:5452-2545-2154">5452-2545-2154</a>
                                  </span>
                                </div>

                                <div class="payment-box mt-3">
                                  <i data-feather="mail"></i>
                                  <span class="font-sm title-color">
                                    <a class="content-color fw-500" href="mailto:someone@example.com">someone@example.com</a>
                                  </span>
                                </div>
                              </div>
                              <!-- Contact End -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="order-data general-details">
                          <!-- Address Section Start -->
                          <div class="address-ordered p-0">
                            <h5 class="cart-title">Order Address</h5>
                            <div class="address">
                              <h5 class="font-default title-color">Nadine Vogt <span class="badges badges-pill badges-theme">Home</span></h5>
                              <p class="font-default content-color"><i data-feather="map-pin"></i> 1418 Riverwood Drive, Suite 3245 Cottonwood, CA 96052, United States</p>
                            </div>
                          </div>
                          <!-- Address Section End -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Order Detail Tab End -->       

                <!-- Profile Tabs Start -->
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="profile">
                    <div class="title-box3">
                      <h3>Maklumat Peribadi</h3>
                    </div>

                    <?php $form = ActiveForm::begin(['class' => 'custom-form form-pill']); ?>
                      <div class="row g-3 g-xl-4">
                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($user, 'fullname')->textInput(['id' => 'fullname', 'class' => 'form-control'])->label('Nama Penuh') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($user, 'email')->textInput(['id' => 'email', 'class' => 'form-control'])->label('Email') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'phone')->textInput(['id' => 'phone', 'class' => 'form-control', 'type'=>'number'])->label('No Telefon') ?>
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'address')->textInput(['id' => 'address', 'class' => 'form-control'])->label('Alamat') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'city')->textInput(['id' => 'city', 'class' => 'form-control'])->label('Bandar') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'zipcode')->textInput(['id' => 'zipcode', 'class' => 'form-control', 'type'=>'number'])->label('Poskod') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'state')->dropDownList( ArrayHelper::map(Negeri::find()->orderBy('negeri_name')->all(),'id', 'negeri_name'), ['id' => 'state', 'prompt' => 'Select State', 'class' => 'form-select form-control'])->label('Negeri');?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'country')->dropDownList(['MY' => 'Malaysia', 'IND' => 'Indonesia'], ['id' => 'country'])->label('Negara');?>
                  </div>
                </div>

                
              </div>

                      <div class="btn-box">
                        <?= Html::submitButton('Simpan Maklumat <i class="arrow"></i>', ['class' => 'btn-solid btn-sm']) ?>
                      </div>
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
                <!-- Profile Tabs End -->

              
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Dashboard End -->
    </main>
    <!-- Main End -->