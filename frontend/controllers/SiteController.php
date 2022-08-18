<?php

namespace frontend\controllers;

use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use frontend\models\Billplz;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use backend\models\UserAddress;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['logout', 'signup', 'login'],
                'rules' => [
                    [
                        'actions' => ['signup', 'index', 'login-ajax', 'login', 'verify-email', 'request-password-reset', 'reset-password', 'error', 'callback', 'redirect',],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['signup', 'logout', 'index', 'login-ajax', 'login','error', 'callback', 'redirect',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action) {
        if ($action->id == 'callback' or $action->id == 'redirect') {
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
        }
        
      if (parent::beforeAction($action)) {
            if ($action->id=='error') $this->layout ='error';
            return parent::beforeAction($action);
        } else {
            return false;
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      
        return $this->render('index');
       
    }

    public function actionError()
    {
      
        return $this->render('error');
       
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLoginAjax()
    {
        $email = Yii::$app->request->post('email');
        $password = Yii::$app->request->post('password');
   
        $model = new LoginForm();
        $model->username = $email;
        $model->password = $password;

        $out=[];
        $out=[
                'fullname' => '',
                'email' => '',
                'address' => '',
                'city' => '',
                'state' => '',
                'country' => '',
                'zipcode' => '',
                'phone' => '',
            ];
        if ($model->login()) {
             $userAddress = UserAddress::find()
             ->where(['user_id' => Yii::$app->user->identity->id])
             ->one();

            
            
            if($userAddress){
                
        
                $out=[
                    'fullname' => $userAddress->user->fullname,
                    'email' => $userAddress->user->username,
                    'address' => $userAddress->address,
                    'city' => $userAddress->city,
                    'state' => $userAddress->state,
                    'country' => $userAddress->country,
                    'zipcode' => $userAddress->zipcode,
                    'phone' => $userAddress->phone,
                ];
            }else{
                $out=[
                    'fullname' => Yii::$app->user->identity->fullname,
                    'email' => Yii::$app->user->identity->username,
                ];
            }
         }else{
            $out=[
                'message' => 'error',
            ];
        }

            
        // ksort($out);

        // print_r($userAddress->user->fullname);

        return json_encode($out);
        
       
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->addFlash('success', "Anda telah berjaya log masuk.");
            return $this->redirect(['dashboard/index']);
            
        } else {
            $this->layout = "//main-login";
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = "//main-login";

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->username = $model->email;
            if($model->signup()){
                Yii::$app->session->addFlash('success', "Pendaftaran Anda Berjaya. Sila semak email anda untuk pengesahan akaun.");
                return $this->redirect(['site/login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->verifyEmail()) {
                Yii::$app->session->setFlash('success', 'Thank you, your email has been confirmed. You can now login to submit your application');
                return $this->redirect(['/site/login']);
        }
        
        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->redirect(['/site/login']);
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = "//main-login";
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                
                return $this->redirect(['/site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    
    public function actionResetPassword($token)
    {
        $this->layout = "//main-login";
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Your new password has been successfully created.');
            
            return $this->redirect(['/site/login']);
        }
        
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->addFlash('success', "Anda telah berjaya log keluar.");

        return $this->redirect(['/site/login']);
    }

    public function actionRedirect(){
        
	    $billplz = new Billplz();
	    if($order = $billplz->processRedirect()){
	        return $this->redirect(['/product/thanks', 'o' => $order->id]);
	    }else{
	        return $this->redirect(['/product/failed']);
	    }
	}

	
	public function actionCallback(){
        
	    $billplz = new Billplz();
	    if($billplz->processCallback()){
	        Yii::$app->response->statusCode = 200;
	        Yii::$app->response->content = 'OK';
			echo 'OK';
	        exit;
	    }
	}


}
