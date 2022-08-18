<?php

namespace backend\modules\shop\models;

use backend\models\Countries;
use backend\models\Negeri;
use Yii;

/**
 * This is the model class for table "{{%order_addresses}}".
 *
 * @property int $order_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $zipcode
 *
 * @property Order $order
 */
class OrderAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_order_addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'address', 'city', 'state_id', 'country_code', 'zipcode', 'phone'], 'required'],
            [['address', 'city', 'country_code', 'zipcode', 'phone'], 'string', 'max' => 255],
            
            [['state_id', 'order_id'], 'integer'],
            
            [['order_id'], 'unique'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'address' => 'Address',
            'city' => 'City',
            'state_id' => 'State',
            'country_id' => 'Country',
            'zipcode' => 'Postcode',
        ];
    }
    
    public function getState(){
        return $this->hasOne(Negeri::className(), ['id' => 'state_id']);
    }
    
    public function getStateName(){
        return $this->state->negeri_name;
    }
    
    public function getCountry(){
        return $this->hasOne(Countries::className(), ['country_code' => 'country_code']);
    }
    
    public function getCountryName(){
        return $this->country->country_name;
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery|\backend\modules\shop\models\query\OrderQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\query\OrderAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\shop\models\query\OrderAddressQuery(get_called_class());
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
