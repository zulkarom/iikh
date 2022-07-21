<?php

namespace backend\modules\shop\models;

use Yii;

/**
 * This is the model class for table "ecm_category".
 *
 * @property int $id
 * @property string $category_name
 */
class Category extends \yii\db\ActiveRecord
{
    public $file_controller;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 255],
            [['is_gshoppe'], 'integer', 'max' => 1],
            [['updated_at'], 'safe'],
            ['image_file', 'file', 'extensions' => 'jpeg, jpg, gif, png', 'on' => ['update']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'is_gshoppe' => 'Is G-Shoppe',
            'image_file' => 'Muat Naik Gambar',
        ];
    }

    public static function is_gshoppe(){
        return [0 => 'No', 1 => 'Yes'];
    }

    public function getGshoppeText(){
        $arr = $this->is_gshoppe();
        if(array_key_exists($this->is_gshoppe, $this->is_gshoppe())){
             return $arr[$this->is_gshoppe];
        } 
    }

}
