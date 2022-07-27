<?php 
use yii\helpers\Url;
use backend\models\OrderItem;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
$orderItem = OrderItem::findOne(['order_id' => $model->id]);
?>

<div class="order-box">
  <div class="order-header">
    <span><i data-feather="box"></i></span>
    <div class="order-content">
      <h5 class="order-status success">Dihantar</h5>
      <p>Pesanan <?=date('F m Y', $model->created_at)?> dan Dihantar pada July 18 2022</p>
    </div>
  </div>

  <div class="order-info">
    <?php foreach ($model->orderItems as $item) { ?>
      
    
    <div class="product-details" data-productDetail="product-detail">
      <div class="img-box"><img src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="product" /></div>
      <div class="product-content">
        <h5><?=$item->product_name?></h5>
        <p class="truncate-3">
          <?=$item->product->description?>
        </p>
        <span>Harga : <span>RM<?=$item->unit_price?></span></span>
        <span>Order Id : <span><?=$model->id?></span></span>
      </div>
    </div>
  <?php } ?>

  <div class="rating-box">
    <div class="row g-3 g-md-4">
    <div class="col-12">
        <div class="order-data summery-wrap">
          <div class="order-summery-box">
            <h5 class="cart-title">Ringkasan Harga</h5>
            <ul class="order-summery">
              <li>
                <span>Produk</span>
                <span><?=$orderItem->product_name?></span>
              </li>

              <li>
                <span>Harga</span>
                <span><?=$orderItem->unit_price?></span>
              </li>

              <li>
                <span>Kuantiti</span>
                <span><?=$orderItem->quantity?></span>
              </li>

              <li>
                <span>Kos Penghantaran</span>
                <span><?=$orderItem->order->ship_cost?></span>
              </li>

              <li class="pb-0">
                <span>Jumlah Keseluruhan</span>
                <span>RM<?=$orderItem->order->total_price?></span>
              </li>
            </ul>
          </div>
        </div>
        <br/>
      </div>

      <div class="col-12">
        <div class="row gy-3 gy-sm-0 g-3 g-md-4">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-12">
                <div class="order-data general-details">
                  <!-- Payment Method Start -->
                  <div class="payment-method mt-0">
                    <h5 class="cart-title">Kaedah Pembayaran</h5>
                    <div class="payment-box">
                      <img src="<?=$dirAsset?>/images/ikhtiar/payment/Billplz_only.png" alt="card" />
                      <span class="font-sm title-color"> FPX Online Banking Payment</span>
                    </div>
                  </div>
                  <!-- Payment Method End -->
                </div>
              </div>
            </div>
            <br/>
             <div class="row">
              <div class="col-12">
                <div class="order-data general-details">
                  <!-- Payment Method Start -->
                  <div class="payment-method mt-0">
                    <h5 class="cart-title">Tracking Nombor</h5>
                    <div class="payment-box">
                      <span class="font-sm title-color"><?=$model->tracking_no?></span>
                    </div>
                  </div>
                  <!-- Payment Method End -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
          <div class="order-data general-details">
            <!-- Address Section Start -->
            <div class="address-ordered p-0">
              <h5 class="cart-title">Alamat Penghantaran</h5>
              <div class="address">
                <h5 class="font-default title-color"><?=$model->fullname?></h5>
                <p class="font-default content-color"><i data-feather="mail"></i><?=$model->email?></p>
                <p class="font-default content-color"><i data-feather="phone"></i><?=$model->orderAddress->phone?></p>
                <p class="font-default content-color"><i data-feather="map-pin"></i> <?=$model->orderAddress->fullAddressText()?></p>
              </div>
            </div>
            <!-- Address Section End -->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
 

        


