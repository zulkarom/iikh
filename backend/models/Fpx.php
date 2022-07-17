<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fpx".
 *
 * @property int $id
 * @property string $bank_name
 * @property string $bank_code
 */
class Fpx extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fpx';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_name', 'bank_code'], 'required'],
            [['bank_name'], 'string', 'max' => 225],
            [['bank_code'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_name' => 'Bank Name',
            'bank_code' => 'Bank Code',
        ];
    }
}
