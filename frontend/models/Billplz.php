<?php

namespace frontend\models;

use backend\models\billplz\API;
use backend\models\billplz\Connect;
use Yii;
use backend\modules\account\models\ClientPayment;

class Billplz
{
	public $x_signature;
	public $api_key;
	public $collection_id;
	public $is_sandbox = true;
	
	public function __construct()
	{
	    $this->is_sandbox = Yii::$app->params['is_sandbox'];
	    
	    if($this->is_sandbox){
			//account skyhint design billplz sandbox
			$this->collection_id = 'vy44jsw7';
	        $this->x_signature = 'S-slKdZCywQwkZstV8hXYKmQ';
	        $this->api_key = '3daa4c5a-fae3-466d-a48f-e3a6752d2f08';
	    }else{
			//real billplz account
			$this->collection_id = 'vy44jsw7';
	        $this->x_signature = 'S-slKdZCywQwkZstV8hXYKmQ';
	        $this->api_key = '3daa4c5a-fae3-466d-a48f-e3a6752d2f08';
	    }
	}
	
	public function createBill($client, $payment){
		//Billplz Simulator
		//BP-FKR01
		$email = $client->cl_email;
		$phone = $client->cl_phone1;
		$name = $client->cl_name;
		$amount = $payment->amount * 100;
		$websiteurl = Yii::$app->params['clientUrl'];
		$description = $payment->description;
		

		$parameter = array(
			'collection_id' => $this->collection_id,
			'email'=> $email ? $email : '',
			'mobile'=> $phone ? $phone : '',
			'name'=> $name ? $name : 'No Name',
			'amount'=> $amount,
			'callback_url'=> $websiteurl . 'site/callback',
			'description'=> $description
		);

		$optional = array(
			'redirect_url' => $websiteurl . 'site/redirect'
		);

		if (empty($parameter['mobile']) && empty($parameter['email'])) {
			$parameter['email'] = 'noreply@billplz.com';
		}

		if (!filter_var($parameter['email'], FILTER_VALIDATE_EMAIL)) {
			$parameter['email'] = 'noreply@billplz.com';
		}

		$connect = new Connect($this->api_key);
		$connect->setStaging($this->is_sandbox);
		$billplz = new API($connect);
		list ($rheader, $rbody) = $billplz->toArray($billplz->createBill($parameter, $optional));
		/***********************************************/
		// Include tracking code here
		/***********************************************/
		if ($rheader !== 200) {
				echo '<pre>'.print_r($rbody, true).'</pre>' . die();
		}
		return $rbody;
	}
	
	public function processRedirect(){
	    $data = Connect::getXSignature($this->x_signature, 'bill_redirect');
	    if ($data['paid']) {
	        $payment = ClientPayment::findOne(['billplz_id' => $data['id']]);
	        if($payment){
	            if($payment->confirmPayment($data, false)){
	                return $payment;
	            }else{
	                $msg = 'The payment failed to update';
	                throw new \yii\web\HttpException(500, $msg );
	            }
	            
	        }else{
	            $msg = 'The requested payment could not be found';
	            throw new \yii\web\HttpException(500, $msg);
	        }
	    }
	    
	    return false;
	}
	
	public function processCallback(){
	    $data = Connect::getXSignature($this->x_signature, 'bill_callback');
		if($data){
			if ($data['paid']) {
				$payment = ClientPayment::findOne(['billplz_id' => $data['id']]);
				if($payment){
					if($payment->confirmPayment($data)){
						return true;
					}else{
						$msg = 'The payment failed to update';
						//echo $msg;
						throw new \yii\web\HttpException(500, $msg );
					}
					
				}else{
					$msg = 'The requested payment could not be found';
					//echo $msg;
					throw new \yii\web\HttpException(500, $msg);
				}
			} 
		}else{
			$msg = 'x_signature problem';
			throw new \yii\web\HttpException(500, $msg);
		}
		

		return false;
	}
}