<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use backend\models\Order;
use backend\models\OrderItem;
use backend\models\OrderAddress;
use backend\models\Product;
use backend\modules\shop\models\ShippingRate;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class ProductController extends Controller
{
    public $layout = '//main';
       

    /**
     * Lists all Product models.
     * @return mixed
     */
   
    public function actionIndex()
    {
        
        //  Yii::$app->session->set(CartItem::SESSION_KEY, []);
        $orderAddress = new OrderAddress();
    
        $order = new Order();
        $orderItem = new OrderItem();
        $product = Product::findOne(1);


        //Check if user login
        if(!Yii::$app->user->isGuest){
            $user = Yii::$app->user->identity;
            $address = $user->defaultAddress;
            $order->fullname = $user->fullname;
            $order->email = $user->email;
            $orderAddress->address = $address->address;
            $orderAddress->city = $address->city;
            $orderAddress->zipcode = $address->zipcode;
            $orderAddress->address = $address->address;
            $orderAddress->country_code = $address->country;
            $orderAddress->state_id = $address->state;
            $orderAddress->phone = $address->phone;
        }

        // $order->total_price = $totalPrice;
        $order->status = Order::STATUS_ORDERED;
        $order->created_at = time();

        /*echo "<pre>";
            print_r(Yii::$app->request->post());
            die();*/

        if ($order->load(Yii::$app->request->post()) && 
            $orderAddress->load(Yii::$app->request->post())) {


            $totalPrice = ($order->quantity)*($product->price);
            $total = $totalPrice + $product->ship_cost;

            $order->billTo = $order->fullname;
            $order->billPhone = $orderAddress->phone;
            // $order->billName = $strBill;
            $order->billAmount = $total;
            $order->pay_status = 'initiate';
            $order->product_price = $totalPrice ;
            $order->total_price = $total ; 
            $order->ship_cost = $product->ship_cost;


            $transaction_id = 'TRAN_'.time(). '-'.  $this->quickRandom(8);
            // get unique recharge transaction id
            while( (Order::find()->where(['transaction_id' => $transaction_id])->count() ) > 0) {
                $transaction_id = 'TRAN_'.time().'-'.$this->quickRandom(8);
            }
            //$transaction_id = strtoupper($transaction_id);
            
            $order->transaction_id = $transaction_id;
             
            
            $transaction = Yii::$app->db->beginTransaction();
            try {
                
                if($flag = $order->save()){
                    if($flag = $order->saveOrderItems($product, $order)){
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
                    // $billpage =  $this->createBill($order);
                    //echo $billpage;die();
                    return $this->redirect('product/thanks');
                    //header($billpage);
                    exit;
                }else{
                    Yii::$app->session->addFlash('error', "Sorry, failed to create order!");
                    
                }
                
                
                
            }
            catch (Exception $e)
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
        $orderAddress->quantity = $quantity+0;
        return ShippingRate::calcShippingCost($orderAddress);
        
    }

    public function actionThanks(){
        return $this->render('thanks');
    }

    private function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}