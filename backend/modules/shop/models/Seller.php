<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_seller".
 *
 * @property int $id
 * @property string $seller_name
 * @property int $created_at
 * @property int $updated_at
 */
class Seller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_seller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seller_name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['seller_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seller_name' => 'Seller Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
