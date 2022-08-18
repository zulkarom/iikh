<?php

use backend\modules\shop\models\Product;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'View Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$web = Yii::getAlias('@web');

$orderAddress = $model->orderAddress;
?>
<style>
table.detail-view th {
    width:15%;
}
</style>


<div class="order-view">


 <div class="card card-solid">
<div class="card-body">



<div class="row">
	<div class="col-md-6">
	
	
	<h2>Order #<?=$model->id?></h2>
<br />

<h4>Amount: RM <?=$model->total_price?></h4>
<br />

	
	
	  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
            'attribute' => 'created_at',
			'label' => 'Order Date',
                'format' => 'date'

                
            ],

            'statusLabel:html',
            'fullname',
            'email:email',
            'tracking_no',
        ],
    ]) ?>
	
	</div>
	<div class="col-md-6">
	<br />
	<h4>Order Items</h4>
	<br />
	 <table class="table table-sm">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th align="center" style="text-align: center">Total Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->orderItems as $item): ?>
            <tr>
                <td>
                    <img src="<?= $web?>/images/product-3.jpg"
                         style="width: 50px;">
                </td>
                <td><?php echo $item->product_name ?>
                <br /> <?php echo Product::productAttrLabels($item->attr_mix) ?>
                
                </td>
                <td><?php echo $item->quantity ?></td>
                <td>RM<?php echo $item->unit_price ?></td>
                <td align="center">RM<?php echo $item->quantity * $item->unit_price ?></td>
            </tr>
        <?php endforeach; ?>
        
          <tr >
               
                            <td align="right" colspan="4"><strong>Sub Total</strong></td>
                       
                            <td align="center"><strong>RM<?php echo number_format($model->product_price,2) ?></strong></td>
                        </tr>
                        
                        <tr >
                           
                            <td align="right" colspan="4">Shipping Cost</td>
                    
                            <td align="center">RM<?php echo number_format($model->ship_cost,2) ?></td>
                        </tr>
                        
                         <tr >
                         
                          <td align="right" colspan="4"><strong>Total Amount</strong></td>
                  
                            <td align="center"><strong>RM<?php echo number_format($model->total_price,2) ?></strong></td>
                        </tr>
                        
        </tbody>
    </table>
	
	
	</div>
</div>

  
    <br />
       <p> <?= Html::a('Update Status & Tracking', ['update', 'id' => $model->id], [
            'class' => 'btn btn-primary',

        ]) ?> </p>
    
    </div>
</div>



<div class="row">
	<div class="col-md-6">
	
	    <h4>Shipping Address</h4>
    
     <div class="card card-solid">
<div class="card-body" style="padding:30px;">


  <b>Fullname:</b> <?=$model->fullname?> <br />
           <b> Email:</b> <?=$model->email?> <br />
           <b> Phone:</b> <?=$model->billPhone?> <br />

            <b>Address:</b> <?=$orderAddress->address?> <?=$orderAddress->city?> 
            <?=$orderAddress->zipcode?> <?=$orderAddress->stateName?> <?=$orderAddress->countryName?>
    
    </div>
</div>
	
	</div>
	<div class="col-md-6">
	
	    <h4>Payment Information</h4>
    
     <div class="card card-solid">
<div class="card-body" style="padding:30px;">


  <b>Billcode:</b> <?=$model->billplz_id?> <br />
           <b> Payment Status:</b> <?=$model->pay_status?> <br />
           <b> Transaction ID:</b> <?=$model->transaction_id?> <br />


    
    </div>
</div>
	
	
	</div>
</div>
   





     
</div>



    <p>
    
        
        
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this order?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    
    