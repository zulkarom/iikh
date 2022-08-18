<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use backend\modules\shop\models\Order;
use backend\modules\shop\models\OrderItem;
use backend\modules\shop\models\OrderAddress;
use backend\modules\shop\models\Product;
use backend\modules\shop\models\ShippingRate;
use frontend\models\Billplz;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class ProductController extends Controller
{
    public $layout = '//main';


    public function beforeAction($action)
{            
    if ($action->id == 'shipping-cost' or $action->id == 'index') {
        $this->enableCsrfValidation = false;
    }

    return parent::beforeAction($action);
}
       

    /**
     * Lists all Product models.
     * @return mixed
     */
   
    public function actionIndex()
    {
        
        //  Yii::$app->session->set(CartItem::SESSION_KEY, []);
        $orderAddress = new OrderAddress();
    
        $order = new Order();
        $product = Product::findOne(1);
        


        //Check if user login
        if(!Yii::$app->user->isGuest){
            $user = Yii::$app->user->identity;
            $order->fullname = $user->fullname;
            $order->email = $user->email;
            
            if($user->defaultAddress){
                $address = $user->defaultAddress;
                
                $orderAddress->address = $address->address;
                $orderAddress->city = $address->city;
                $orderAddress->zipcode = $address->zipcode;
                $orderAddress->address = $address->address;
                $orderAddress->country_code = $address->country;
                $orderAddress->state_id = $address->state;
                $orderAddress->phone = $address->phone;
            }
            $order->created_by = Yii::$app->user->identity->id;
        }


       

        // $order->total_price = $totalPrice;
        $order->status = Order::STATUS_INITIATE;
        $order->created_at = time();
        

        /*echo "<pre>";
            print_r(Yii::$app->request->post());
            die();*/

        $quantity = Yii::$app->request->post('quantity');


        if ($order->load(Yii::$app->request->post()) && 
            $orderAddress->load(Yii::$app->request->post())) {
            $email = $order->email;
                if(!Yii::$app->user->isGuest){
                    $user = Yii::$app->user->identity;
                    $order->fullname = $user->fullname;
                    $email = $user->email;
                }

            $order->email = $email;
            $ship_cost = ShippingRate::calcShippingCost($orderAddress, $quantity);

            $totalPrice = ($quantity)*($product->price);
            $total = $totalPrice + $ship_cost;
            
            // $order->billName = $strBill;
            $order->billAmount = $total;
            $order->pay_status = 'initiate';
            $order->product_price = $totalPrice ;
            $order->total_price = $total ; 
            $order->ship_cost = $ship_cost;
            $transaction_id = 'TRAN_'.time(). '-'.  $this->quickRandom(8);
            // get unique recharge transaction id
            while((Order::find()->where(['transaction_id' => $transaction_id])->count()) > 0) {
                $transaction_id = 'TRAN_'.time().'-'.$this->quickRandom(8);
            }
            $order->transaction_id = $transaction_id;
             
            //billplz
            

                $billplz = new Billplz();
                $order->billplz_mobile = $orderAddress->phone;
                $order->billPhone = $orderAddress->phone;
                $order->billplz_desc = $product->name;
                $result = $billplz->createBill($order);
                if($result){
                    $order->billplz_id = $result['id'];
                    $order->billplz_at = time();
                    $order->is_billplz = 1;
                    $order->billplz_name = $order->fullname;
                    $order->billplz_email = $email;
                    
                }



            $transaction = Yii::$app->db->beginTransaction();
            try {
                
                if($flag = $order->save()){
                    if($flag = $order->saveOrderItems($product, $order->id, $quantity)){
                        $orderAddress->order_id = $order->id;
                        if(!$orderAddress->save()){
                            $orderAddress->flashError();
                           $flag = false; 
                        }
                    }
                }else{
                    $order->flashError();
                }
                
                
                if($flag){
                    $transaction->commit();

                    // $order->sendEmailToCustomer();
                    //$order->sendEmailToVendor();
                    //echo $billpage;die();
                    //return $this->redirect(['product/thanks', 'order_id' => $order->id]);
                    return $this->redirect($result['url'] . '?auto_submit=true');
                    exit;
                }else{
                    Yii::$app->session->addFlash('error', "Sorry, failed to create order!");
                    
                }
                
                
                
            }
            catch (\Exception $e)
            {
                $transaction->rollBack();
                echo $e->getMessage();
            }

            


        }
        
        
        
        return $this->render('index', [
            'order' => $order,
            'product' => $product,
            'orderAddress' => $orderAddress
        ]);
    }

    public function actionShippingCost(){
       
        $state = Yii::$app->request->post('state');
        $country = Yii::$app->request->post('country');
        $quantity = Yii::$app->request->post('quantity');
        $orderAddress = new \stdClass();
        $orderAddress->state_id = $state;
        $orderAddress->country_code = $country;
        $quantity = $quantity+0;
        $orderAddress->quantity = $quantity;

        return ShippingRate::calcShippingCost($orderAddress,$quantity);
        
    }

    public function actionThanks($o){

        $order = Order::findOne($o);
        $orderAddress = OrderAddress::findOne(['order_id' => $o]);
        $orderItem = OrderItem::findOne(['order_id' => $o]);
        $product = Product::findOne(1);

        return $this->render('thanks', [
            'order' => $order,
            'orderAddress' => $orderAddress,
            'orderItem' => $orderItem,
            'product' => $product
        ]);
    }

    public function actionFailed(){

        return $this->render('failed', [
        ]);
    }

    private function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}