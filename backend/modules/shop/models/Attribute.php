<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_attribute".
 *
 * @property int $id
 * @property string $attr_name
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attr_name'], 'required'],
            [['attr_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attr_name' => 'Attr Name',
        ];
    }
}
