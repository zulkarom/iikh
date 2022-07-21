<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 * @property string $currency_code
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'string', 'max' => 2],
            [['country_name'], 'string', 'max' => 45],
            [['currency_code'], 'string', 'max' => 3],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'currency_code' => 'Currency Code',
        ];
    }
}
