<?php

namespace backend\modules\shop\models;

use common\models\User;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "{{%orders}}".
 *
 * @property int          $id
 * @property float        $total_price
 * @property int          $status
 * @property string       $firstname
 * @property string       $lastname
 * @property string       $email
 * @property string|null  $transaction_id
 * @property int|null     $created_at
 * @property int|null     $created_by
 *
 * @property OrderAddress $orderAddress
 * @property OrderItem[]  $orderItems
 * @property User         $createdBy
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_INITIATE = 0;
    const STATUS_FAILED = 1;
    const STATUS_ORDERED = 10;
    const STATUS_PAID = 20;
    const STATUS_PROSESSING = 30;
    const STATUS_SHIPPED = 40;
    const STATUS_COMPLETED = 50;

    public $payment;


    public static function getStatusList()
    {
        return [
            self::STATUS_INITIATE => 'Initiate',
            self::STATUS_FAILED => 'Failed',
            self::STATUS_ORDERED => 'Ordered',
            self::STATUS_PAID => 'Paid',
            self::STATUS_PROSESSING => 'Processing',
            self::STATUS_SHIPPED => 'Shipped',
            self::STATUS_COMPLETED => 'Completed',
        ];
    }
    
    public static function getStatusColor()
    {
        return [
            self::STATUS_INITIATE => 'default',
            self::STATUS_FAILED => 'danger',
            self::STATUS_ORDERED => 'warning',
            self::STATUS_PAID => 'success',
            self::STATUS_PROSESSING => 'info',
            self::STATUS_SHIPPED => 'primary',
            self::STATUS_COMPLETED => 'success',
        ];
    }

    public static function countOrder($status_no){
        return self::find()
        ->where(['status' => $status_no])
        ->count();
    }

    public function confirmPayment($bill, $callback = true){
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $arr= array();
            $arr['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $arr['datetime'] = date('y-m-d h:m:s');
            
            if($callback){
                $this->billplz_state = $bill['state'];
                $arr['post_data'] = Yii::$app->request->post();
                $this->billplz_callback = json_encode($arr);
            }else{
                $arr['post_data'] = Yii::$app->request->get();
                $this->billplz_redirect = json_encode($arr);
            }
            $this->status = self::STATUS_PAID;
            $this->pay_status = 'Paid';
            $this->payment_created = time();
            $this->billplz_paid_at = $bill['paid_at'];

            $this->sendEmailToVendor();
            $this->sendEmailToCustomer();
            $this->notify_vendor = 1;
            $this->notify_customer = 1;
            
            if($this->save()){
                
                $transaction->commit();
                return true;
                
            }else{
                echo 'error saving payment model';
                if($this->getErrors()){
                    foreach($this->getErrors() as $error){
                        if($error){
                            foreach($error as $e){
                                echo $e;
                            }
                        }
                    }
                }

                $transaction->rollBack();
            }
        }catch(\Exception $e) {
            echo $e->getMessage();
            $transaction->rollBack();
        }
        //echo 'false' ; die();
        return false;

    }

    public function confirmPaymentLocal(){
        $transaction = Yii::$app->db->beginTransaction();
        try{
 
            $this->status = self::STATUS_PAID;
            $this->pay_status = 'Paid';
            $this->payment_created = time();

            $this->sendEmailToVendor();
            $this->sendEmailToCustomer();
            $this->notify_vendor = 1;
            $this->notify_customer = 1;
            
            if($this->save()){
                
                $transaction->commit();
                return true;
                
            }else{
                echo 'error saving payment model';
                if($this->getErrors()){
                    foreach($this->getErrors() as $error){
                        if($error){
                            foreach($error as $e){
                                echo $e;
                            }
                        }
                    }
                }

                $transaction->rollBack();
            }
        }catch(\Exception $e) {
            echo $e->getMessage();
            $transaction->rollBack();
        }
        //echo 'false' ; die();
        return false;

    }
    
    public function getStatusText(){
        if(array_key_exists($this->status, $this->statusList)){
            return $this->listStatus()[$this->status];
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'status', 'fullname', 'email', 'billPhone', 'bank_code'], 'required'],
            [['total_price'], 'number'],
            [['email'], 'email'],
            [['created_at', 'created_by', 'status', 'ship_method', 'payment'], 'integer'],
            [['fullname', 'pay_status'], 'string', 'max' => 60],
            [['email', 'transaction_id', 'order_note'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Order #',
            'total_price' => 'Total Price',
            'status' => 'Status',
            'statusLabel' => 'Status',
            'fullname' => 'Nama Penuh',
            'email' => 'Alamat Emel',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'bank_code' => 'Perbankan Atas Talian',
        ];
    }
    
    public function getShippingMethod(){
        if($this->ship_method == 1){
            return 'Standard Shipping';
        }else if($this->ship_method == 2){
            return 'Self-Picked';
        }else{
            return '';
        }
    }
    
    

    /**
     * Gets query for [[OrderAddress]].
     *
     * @return \yii\db\ActiveQuery|\backend\modules\shop\models\query\OrderAddressQuery
     */
    public function getOrderAddress()
    {
        return $this->hasOne(OrderAddress::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[OrderItem]].
     *
     * @return \yii\db\ActiveQuery|\backend\modules\shop\models\query\OrderItemQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\User
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\OrderQuery(get_called_class());
    }    

    public function saveOrderItems($product, $order_id, $quantity)
    {
        // $cartItems = CartItem::getItemsForUser(currUserId());
        //echo count($cartItems);
        if($product){
                $orderItem = new OrderItem();
                //echo $cartItem['name']. 'xxxxxxxxxxxxxxxxxxxxx';die();
                $orderItem->product_name = $product->name;
                // $orderItem->attr_mix = $cartItem['attr_mix'];
                $orderItem->product_id = $product->id;
                $orderItem->unit_price = $product->price;
                $orderItem->order_id = $order_id;
                $orderItem->quantity = $quantity;
                if (!$orderItem->save()) {
                    $orderItem->flashError();
                    return false;
                    
            }
        }else{
            Yii::$app->session->addFlash('error', "No items");
            return false;
        }
        

        return true;
    }

    public function getItemsQuantity()
    {
        return OrderItem::find()->where(['order_id' => $this->id])->sum('quantity');

    }


    public function sendEmailToVendor()
    {
        if($this->notify_vendor == 0){
            return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'order_completed_vendor-html', 'text' => 'order_completed_vendor-text'],
                ['order' => $this]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
            ->setTo(Yii::$app->params['vendorEmail'])
            ->setSubject('New order has been made at ' . Yii::$app->name. ' Order #' . $this->id)
            ->send();
        }
        
    }

    public function sendEmailToCustomer()
    {
        if ($this->notify_customer == 0) {
            return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'order_completed_customer-html', 'text' => 'order_completed_customer-text'],
                ['order' => $this]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
            ->setTo($this->email)
            ->setSubject('Your order & payment are confirmed at ' . Yii::$app->name. ' Order #' . $this->id)
            ->send();
        }
    }
    
    public function getStatusLabel(){
        $status = $this->statusList;
        $color = $this->statusColor;
        
        return '<span class="label label-'.$color[$this->status].'" >' . strtoupper($status[$this->status]). '</span>';
    }


    
    

    
    
    
    
    public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }

    }

}
