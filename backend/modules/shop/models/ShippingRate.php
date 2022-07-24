<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_ship_rate".
 *
 * @property int $id
 * @property int $zone_id
 * @property string $weight_from
 * @property string $weight_to
 * @property string $ship_cost
 */
class ShippingRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_ship_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id', 'weight_from', 'weight_to', 'ship_cost'], 'required'],
            [['zone_id'], 'integer'],
            [['weight_from', 'weight_to', 'ship_cost'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone_id' => 'Zone ID',
            'weight_from' => 'Weight From (kg)',
            'weight_to' => 'Weight To (kg)',
            'ship_cost' => 'Ship Cost',
        ];
    }
    
    public static function calcShippingCost($orderAddress,$quantity){
       
     
        
                
        $product = Product::findOne(1);
        
        $w = $product->weight;
        $total_weight = $w*$quantity;        
            
        
        $zone = ZoneItem::findOne(['state_id' => $orderAddress->state_id, 'country_code' => $orderAddress->country_code]);
        if($zone){
            $z = $zone->zone_id;
            $rate = ShippingRate::find()
            ->where(['zone_id' => $z])
            ->andWhere(['<=', 'weight_from', $total_weight])
            ->andWhere(['>=', 'weight_to', $total_weight])
            ->one();
            
            if($rate){
                return $rate->ship_cost;

            }
        }

        return 0;

    }
}
