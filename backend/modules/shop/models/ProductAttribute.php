<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_product_attr".
 *
 * @property int $id
 * @property int $product_id
 * @property string $attr_name
 * @property string $attr_value
 * @property string $attr_price
 * @property int $qty_stock
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_product_attr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'attr_id', 'product_id', 'attr_value'], 'required'],
            [['product_id', 'attr_id'], 'integer'],
            [['attr_value'], 'string', 'max' => 100],
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
            'attr_id' => 'Attribute',
            'attr_value' => 'Value',
            'attr_price' => 'Price',
            'qty_stock' => 'Available Quantity',
        ];
    }
    
    public function getAttributeModel(){
         return $this->hasOne(Attribute::className(), ['id' => 'attr_id']);
    }
    
    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    public function getAttrName(){
        return $this->attributeModel->attr_name;
    }
    

    
    

}
