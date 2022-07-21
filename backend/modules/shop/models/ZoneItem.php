<?php

namespace backend\modules\shop\models;

use Yii;
use backend\models\Negeri;
use yii\helpers\ArrayHelper;
use backend\models\Countries;

/**
 * This is the model class for table "ecm_zone_item".
 *
 * @property int $id
 * @property int $zone_id
 * @property int $country_code
 * @property int $state_id
 */
class ZoneItem extends \yii\db\ActiveRecord
{
    public $negeri_name;
    public $country_name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_zone_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id', 'country_code', 'state_id'], 'required'],
            [['zone_id', 'state_id'], 'integer'],
            [['country_code'], 'string'],
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
            'countryName' => 'Country',
            'country_code' => 'Country',
            'stateName' => 'State',
            'state_id' => 'State',
        ];
    }
    
    public function getZoneCost(){
         return $this->hasOne(ZoneCost::className(), ['zone_id' => 'user_id']);
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

    
    public static function listState(){
        $list = self::find()
        ->alias('a')
        ->select(['a.state_id', 's.negeri_name'])
        ->joinWith(['state s'])
        ->distinct()
        ->all();
        
        return ArrayHelper::map($list, 'state_id', 'negeri_name');
    }
    
    public static function listCountry(){
        $list = self::find()
        ->alias('a')
        ->select(['a.country_code', 's.country_name'])
        ->joinWith(['country s'])
        ->distinct()
        ->all();
        
        return ArrayHelper::map($list, 'country_code', 'country_name');
    }
}
