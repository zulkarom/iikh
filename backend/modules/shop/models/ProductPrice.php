<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_product_price".
 *
 * @property int $id
 * @property int $product_id
 * @property string $attr_mix
 * @property string $price
 * @property int $stock
 */
class ProductPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_product_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'attr_mix'], 'required'],
            [['product_id', 'stock'], 'integer'],
            [['price'], 'number'],
            [['attr_mix'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'attr_mix' => 'Attr Mix',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }
}
