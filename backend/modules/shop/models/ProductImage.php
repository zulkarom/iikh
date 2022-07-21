<?php

namespace backend\modules\shop\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "ecm_product_img".
 *
 * @property int $id
 * @property int $product_id
 * @property string $product_file
 * @property int $created_at
 * @property int $updated_at
 */
class ProductImage extends \yii\db\ActiveRecord
{
    public $file_controller;
    public $product_instance;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_product_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'created_at', 'updated_at'], 'integer'],
            [['product_file'], 'string'],
            
            [['product_file'], 'required', 'on' => 'product_upload'],
            [['product_instance'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx', 'maxSize' => 5000000],
            [['updated_at'], 'required', 'on' => 'product_delete'],
            
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
            'product_file' => 'Product File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
	
	public static function getImages($id){
		$num = self::find()->where(['product_id' => $id])->count();
		if($num < 4){
			for($num = 1; $num <=4; $num++){
				$new = new ProductImage();
				$new->product_id = $id;
				$new->created_at = time();
				$new->updated_at = time();
				if(!$new->save()){
					$new->flashError();
				}
			}
		}
		return self::find()->where(['product_id' => $id])->all();
	}
	
	public function getProduct(){
         return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

	
	public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }

    }
    
	
}
