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
 * @property string|null  $paypal_order_id
 * @property int|null     $created_at
 * @property int|null     $created_by
 *
 * @property OrderAddress $orderAddress
 * @property OrderItem[]  $orderItems
 * @property User         $createdBy
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_FAILED = 1;
    const STATUS_ORDERED = 10;
    const STATUS_PAID = 20;
    const STATUS_SHIPPED = 30;
    const STATUS_COMPLETED = 50;

    public $quantity;
    
    public function listStatus(){
        return [0 => 'Draft', 1 => 'Failed', 10 => 'Ordered'
            , 20 => 'Processing', 30 => 'Shipped', 50 => 'Completed'
        ];
    }
    
    public function getStatusText(){
        if(array_key_exists($this->status, $this->listStatus())){
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
            [['total_price', 'status', 'fullname', 'email', 'billPhone'], 'required'],
            [['total_price'], 'number'],
            [['email'], 'email'],
            [['created_at', 'created_by', 'status', 'ship_method'], 'integer'],
            [['fullname', 'pay_status'], 'string', 'max' => 60],
            [['email', 'transaction_id', 'paypal_order_id', 'order_note'], 'string', 'max' => 255],
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
            'fullname' => 'Fullname',
            'email' => 'Email',
            'transaction_id' => 'Transaction ID',
            'paypal_order_id' => 'Paypal Order ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
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
        return new \backend\modules\shop\models\query\OrderQuery(get_called_class());
    }

    

    public function saveOrderItems()
    {
        $cartItems = CartItem::getItemsForUser(currUserId());
        //echo count($cartItems);
        if($cartItems){
            foreach ($cartItems as $cartItem) {
                $orderItem = new OrderItem();
                //echo $cartItem['name']. 'xxxxxxxxxxxxxxxxxxxxx';die();
                $orderItem->product_name = $cartItem['name'];
                $orderItem->attr_mix = $cartItem['attr_mix'];
                $orderItem->product_id = $cartItem['id'];
                $orderItem->unit_price = $cartItem['price'];
                $orderItem->order_id = $this->id;
                $orderItem->quantity = $cartItem['quantity'];
                if (!$orderItem->save()) {
                    $orderItem->flashError();
                    return false;
                    
                    break;
                }
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

    public function sendEmailToCustomer()
    {
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
    
    public function getStatusLabel(){
        $status = $this->statusList;
        $color = $this->statusColor;
        
        return '<span class="label label-'.$color[$this->status].'" >' . strtoupper($status[$this->status]). '</span>';
    }


    
    public static function getStatusList()
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_FAILED => 'Failed',
            self::STATUS_ORDERED => 'Ordered',
            self::STATUS_PAID => 'Paid',
            self::STATUS_SHIPPED => 'Shipped',
            self::STATUS_COMPLETED => 'Completed',
        ];
    }
    
    public static function getStatusColor()
    {
        return [
            self::STATUS_DRAFT => 'default',
            self::STATUS_FAILED => 'danger',
            self::STATUS_ORDERED => 'warning',
            self::STATUS_PAID => 'success',
            self::STATUS_SHIPPED => 'primary',
            self::STATUS_COMPLETED => 'info',
        ];
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
