<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Session;
use yii\filters\VerbFilter;
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
                'only' => ['logout', 'signup', 'login'],
                'rules' => [
                    [
                        'actions' => ['signup', 'index', 'login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'login'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
      
        return $this->render('index');
       
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
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
            }

            
            // ksort($out);

            // print_r($userAddress->user->fullname);

            return json_encode($out);
        }
       
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */

}
