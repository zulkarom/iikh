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

       

        if ($order->load(Yii::$app->request->post()) && 
            $orderAddress->load(Yii::$app->request->post())) {

            $totalPrice = $quantity*100;
            $total = $totalPrice + 7.00;

            $order->billTo = $order->fullname;
            $order->billPhone = $orderAddress->phone;
            // $order->billName = $strBill;
            $order->billAmount = $total;
            $order->pay_status = 'initiate';
            $order->product_price = $totalPrice ;
            $order->total_price = $total ; 
            $order->ship_cost = 7.00;


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
                    if($flag = $order->saveOrderItems()){
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
                    return $this->redirect('thanks');
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
            // 'items' => $cartItems,
            'order' => $order,
            // 'totalPrice' => $totalPrice,
            'orderAddress' => $orderAddress
        ]);
    }

    public function actionThanks(){
        return $this->render('thank-you');
    }
}