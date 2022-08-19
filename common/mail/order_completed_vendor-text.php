<?php
/**
 * User: TheCodeholic
 * Date: 12/17/2020
 * Time: 10:40 AM
 */

/** @var \common\models\Order $order */

$orderAddress = $order->orderAddress;
?>

Order #<?php echo $order->id ?> summary:

Account information
    Fullname: <?php echo $order->fullname ?>
    Email: <?php echo $order->email ?>

Address information
    Address: <?php echo $orderAddress->address ?>
    City: <?php echo $orderAddress->city ?>
    State: <?php echo $orderAddress->stateName ?>
    Country: <?php echo $orderAddress->countryName ?>
    Postode: <?php echo $orderAddress->zipcode ?>

Products
     Name       Quantity     Price
<?php foreach ($order->orderItems as $item): ?>
    <?php echo $item->product_name ?>  <?php echo $item->quantity ?>    <?php echo 'RM' . $item->quantity * $item->unit_price?>
<?php endforeach; ?>

Total Items: <?php echo $order->getItemsQuantity() ?>
Shipping Cost: <?php echo $order->ship_cost ?>
Total Price: <?php echo 'RM' . $order->total_price ?>
Status: Paid