<?php

namespace backend\modules\shop\models;

use common\models\User;
use Yii;


/**
 * This is the model class for table "{{%user_addresses}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $zipcode
 *
 * @property User $user
 */
class Buyer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_buyer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'address', 'city', 'state', 'country', 'zipcode', 'phone'], 'required', 'on' => 'profile'],
            [['user_id'], 'integer'],
            [['address', 'city', 'state', 'country', 'zipcode', 'phone'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zipcode' => 'Postcode',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\User
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\query\UserAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\shop\models\query\UserAddressQuery(get_called_class());
    }
	
	public static function checkExist(){
		$result = self::findOne(['user_id' => Yii::$app->user->identity->id]);
		if($result){
			return true;
		}else{
			$new = new self;
			$new->user_id = Yii::$app->user->identity->id;
			if(!$new->save()){
				$new->flashError();
			}
		}
		
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
