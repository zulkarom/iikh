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

       

        if ($order->load(Yii::$app->request->post()) && 
            $orderAddress->load(Yii::$app->request->post())) {


 echo "<pre>";
        print_r(Yii::$app->request->post());
        die();


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