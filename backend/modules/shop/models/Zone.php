<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_zone".
 *
 * @property int $id
 * @property string $zone_name
 */
class Zone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'zone_name'], 'required'],
            [['zone_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zone_name' => 'Zone Name',
        ];
    }
}
