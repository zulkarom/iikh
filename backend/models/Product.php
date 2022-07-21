<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use backend\modules\shop\models\Category;
use backend\models\Negeri;
/**
 * This is the model class for table "{{%products}}".
 *
 * @property int         $id
 * @property string      $name
 * @property string|null $description
 * @property string|null $image
 * @property float       $price
 * @property int         $status
 * @property int|null    $created_at
 * @property int|null    $updated_at
 * @property int|null    $created_by
 * @property int|null    $updated_by
 *
 * @property CartItem[]  $cartItems
 * @property OrderItem[] $orderItems
 * @property User        $createdBy
 * @property User        $updatedBy
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var \yii\web\UploadedFile
     */
    public $imageFile;
    public $category_nama;
    public $cat_id;
    public $company_name;
    public $city;
    public $negeri_name;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_products';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'status', 'stock', 'weight', 'category_id', 'seller_id'], 'required', 'on' => 'create'],
            [['name', 'price', 'status', 'category_id'], 'required', 'on' => 'common_create'],
            [['description'], 'string'],
            [['price', 'ship_cost', 'weight'], 'number'],
            [['imageFile'], 'image', 'extensions' => 'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'item_order', 'stock', 'ship_free'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
            [['category_id'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Product ID',
            'name' => 'Product Name',
            'seller_id' => 'Seller',
            'weight' => 'Weight (kg)',
            'description' => 'Description',
            'image' => 'Product Image',
            'imageFile' => 'Product Image',
            'price' => 'Default Price',
            'stock' => 'Default Stock',
            'ship_cost' => 'Default Shipping Charge',
            'ship_free' => 'Shipping',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'item_order' => 'Sort',
            'category.category_name' => 'Category',
            'category_id' => 'Category',
        ];
    }

    public function statusList(){
        return [1 => 'ACTIVE', 0 => 'INACTIVE'];
    }

    public function getStatusText(){
        if($this->status >= 0){
            return $this->statusList()[$this->status];
        }else{
            return '';
        }
    }

    public function getStatusColor(){
        if($this->status == 1){
            return '<span class="label label-success">'.$this->statusText.'</span>';
        }else if($this->status == 0){
            return '<span class="label label-danger">'.$this->statusText.'</span>';
        }
    }


    /**
     * Gets query for [[OrderItem]].
     *
     * @return \yii\db\ActiveQuery|\backend\modules\shop\models\query\OrderItemQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
    }
    
    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\User
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
   
    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\User
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
    public function getDefaultImageId(){
        $result = ProductImage::find()->where(['product_id' => $this->id])->orderBy('id ASC')->one();
        if($result){
           return $result->id; 
        }else{
            return 0;
        }
    }

    /**
     * Get short version of the description
     *
     * @return string
     */
    public function getShortDescription()
    {
        return \yii\helpers\StringHelper::truncateWords(strip_tags($this->description), 30);
    }

   
    
    public function getProductAttributes(){
         return $this->hasMany(ProductAttribute::className(), ['product_id' => 'id']);
    }
    
    public function getDistinctAttributes(){
        return ProductAttribute::find()
        ->select('attr_id')
        ->where(['product_id' => $this->id])
        ->distinct()
        ->orderBy('attr_id ASC')
        ->all();
    }
    
    public function attrArrays(){
        $attrs = $this->distinctAttributes;
        $array = array();
        if($attrs){
            foreach($attrs as $a){

                $arr = array();
                foreach($this->listAttributeValues($a->attr_id) as $v){
                    $arr[] = $v->id;
                }
                
                $array[] = $arr;
            }
        }
        return $array;
    }
    
    public function attrCombinations($i = 0) {
        $arrays = $this->attrArrays();
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }
        
        // get combinations from subsequent arrays
        $tmp = $this->attrCombinations($i + 1);
        
        $result = array();
        
        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                array_merge(array($v), $t) :
                array($v, $t);
            }
        }
        
        return $result;
    }
    
    public function listAttributeValues($attr_id){
        return ProductAttribute::find()
        ->where(['product_id' => $this->id, 'attr_id' => $attr_id])
        ->all();
    }
    
    public static function productAttrLabels($json_attr){
       // print_r($json_attr);die();
        $array = json_decode($json_attr);
        
        $str = '<i>';
        if($array){
            foreach($array as $i => $val){
                $a = ProductAttribute::findOne($val);
                if($a){
                    $ast = $i == 0 ? '*' : '<br />*';
                    $str .= $ast . $a->attributeModel->attr_name . ': ' . $a->attr_value;
                }
            }
        }
        return $str . '</i>';
    }
    
    public static function productAttrLabelsPlain($json_attr){
        $array = json_decode($json_attr);
        
        $str = '';
        if($array){
            foreach($array as $i => $val){
                $a = ProductAttribute::findOne($val);
                if($a){
                    $ast = $i == 0 ? '' : ' ';
                    $str .= $ast . $a->attributeModel->attr_name . ' ' . $a->attr_value;
                }
            }
        }
        return $str;
    }
    
    public function getShippingOptions(){
        return [0=>'Default (Shipping Rate Setting)', 1 => 'Free Shipping'];
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
