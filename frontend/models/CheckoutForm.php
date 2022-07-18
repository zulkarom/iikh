<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
use common\models\User;
/**
 * Signup form
 */
class CheckoutForm extends Model
{
    public $fullname;
    public $address;
    public $email;
    public $city;
    public $state;
    public $postcode;
    public $country;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Register
            
            [['email', 'password', 'password_repeat', 'fullname'], 'required'],
            
            [['email'], 'email'],
            ['email', 'trim'],
            ['email', 'string', 'max' => 100],
            
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been taken.'],
            
            ['password', 'string', 'min' => 6],
            
            [['fullname'], 'string', 'min' => 2, 'max' => 100],
            
            
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            
        ];

    }
	
 	public function attributeLabels()
    {
        $label = parent::attributeLabels();

        $label['email'] = 'Your Email address';
        $label['password'] = 'Password';
        $label['password_repeat'] = 'Repeat Password';

        $label['fullname'] = 'Full Name';
        return $label;
    } 
    
    
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->fullname = $this->fullname;
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);
        
    }
    
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->params['senderName']])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
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
