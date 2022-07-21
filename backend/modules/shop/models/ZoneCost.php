<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_zone_cost".
 *
 * @property int $id
 * @property int $zone_id
 * @property string $zone_price
 * @property int $qty_from
 * @property int $qty_to
 */
class ZoneCost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_zone_cost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id'], 'required'],
            [['zone_id', 'qty_from', 'qty_to'], 'integer'],
            [['zone_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone_id' => 'Zone',
            'zone_price' => 'Charge Amount',
            'qty_from' => 'Qty From',
            'qty_to' => 'Qty To',
        ];
    }
    
    public function getProduct(){
         return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    public function getZone(){
        return $this->hasOne(Zone::className(), ['id' => 'zone_id']);
    }
    
    public function getZoneName(){
        return $this->zone->zone_name;
    }
    
    
    

}
