<?php
  $dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

 <!-- Top Section Start -->
      <section class="p-0">
        <div class="success-icon">
          <div class="img-wrap">
            <img class="success-img img-fluid" src="<?=$dirAsset?>/svg/order-success.svg" alt="vector" />
            <img class="check" src="<?=$dirAsset?>/svg/check.svg" alt="check" />
          </div>

          <div class="success-contain">
            <h1>Terima Kasih</h1>
            <h5 class="font-light">Pembayaran Anda Telah Berjaya</h5>
            <h6 class="font-light">Transaction ID:267676GHERT105467</h6>
          </div>
        </div>
      </section>
      <!-- Top Section End -->

      <!-- Compare Section Start -->
      <section class="section-b-space order-success">
        <div class="container-lg">
          <div class="row g-3 g-md-4 cart">
            <div class="col-md-7 col-lg-7 col-xl-8">
              <div class="cart-wrap">
                <div class="items-list">
                  <table class="table cart-table">
                    <thead>
                      <tr>
                        <th class="d-none d-sm-table-cell">PRODUK</th>
                        <!-- <th class="d-none d-sm-table-cell">NAMA</th> -->
                        <th class="d-none d-sm-table-cell">HARGA</th>
                        <th class="d-none d-lg-table-cell">KUANTITI</th>
                        <th class="d-none d-xl-table-cell">JUMLAH</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <div class="product-detail">
                            <img class="pr-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="image" />
                            <div class="details">
                              <h4 class="title-color font-default2"><?=$product->name?></h4>
                              
                            </div>
                          </div>
                        </td>

                        <td class="price d-none d-sm-table-cell">RM<?=$orderItem->unit_price?></td>
                        <td class="price d-none d-lg-table-cell"><?=$orderItem->quantity?></td>
                        <td class="total d-none d-xl-table-cell">RM<?=$order->product_price?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-5 col-lg-5 col-xl-4">
              <div class="summery-box">
                <div class="row g-3 g-lg-4">
                  <div class="col-12">
                    <div class="summery-wrap">
                      <div class="cart-wrap grand-total-wrap">
                        <div>
                          <div class="order-summery-box">
                            <h5 class="cart-title">Butiran Harga</h5>
                            <ul class="order-summery">
                              <li>
                                <span>Jumlah Pembelian</span>
                                <span><?=$order->product_price?></span>
                              </li>

                              <li>
                                <span>Kos Penghantaran</span>
                                <span class="theme-color"><?=$order->ship_cost?></span>
                              </li>

                              <li class="pb-0">
                                <span>Jumlah Keseluruhan</span>
                                <span><?=$order->total_price?></span>
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
                            <li><span id="li-phone"><?=$orderAddress->phone?></li>
                          </ul>
                        </div>

                        <!-- <div class="col-12">
                          <div class="delivery-box">
                            <p class="d-flex flex-column g-0 title-color font-md mb-0">
                              Expected Date Of Delivery:
                              <strong> June 22, 2022</strong>
                            </p>
                            <a href="user-dashboard.html" class="font-danger font-md fw-500">Track Order</a>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Compare Section End -->