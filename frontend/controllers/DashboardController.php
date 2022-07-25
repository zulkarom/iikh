<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use common\models\User;
use backend\models\UserAddress;
use frontend\models\OrderSearch;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class DashboardController extends Controller
{
    public $layout = '//main';
       
    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;
        $user = User::findOne($user_id);
        $userAddress = UserAddress::find()->where(['user_id' => $user_id])->one();
        if(!$userAddress){
            $userAddress = new UserAddress();
        }

        //Order
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($user->load(Yii::$app->request->post()) && 
            $userAddress->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                
                if($flag = $user->save()){
                        $userAddress->user_id = $user_id;
                        if(!$userAddress->save()){
                            // $userAddress->flashError();
                           $flag = false; 
                        }
                    }else{
                    /*$user->flashError();*/
                }
                
                
                
                if($flag){
                    $transaction->commit();
                    
                    // $order->sendEmailToCustomer();
                    //$order->sendEmailToVendor();
                    // $billpage =  $this->createBill($order);
                    //echo $billpage;die();
                    return $this->redirect(['product/thanks', 'order_id' => $order->id]);
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
            'user' => $user,
            'userAddress' => $userAddress,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
}