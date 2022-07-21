<?php

namespace backend\modules\shop\models;

use Yii;
use common\models\User;
use backend\models\Negeri;
use backend\models\Countries;
use common\models\Validation;
use backend\models\CountryCode;
/**
 * This is the model class for table "ecm_company".
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 */
class Company extends \yii\db\ActiveRecord
{
    public $file_controller;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecm_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'state', 'city', 'office_phone', 'handphone'], 'required'],
            [['user_id', 'status', 'state', 'country'], 'integer'],
            [['company_name'], 'string', 'max' => 225],
            [['postcode'], 'string', 'max' => 100],
            [['office_phone', 'handphone'], 'string', 'max' => 20],
            [['description'], 'string'],
            [['updated_at'], 'safe'],
            [['address'], 'string', 'max' => 200],
            [['website', 'whatsapp', 'facebook', 'instagram', 'telegram', 'tiktok', 'twitter'], 'url', 'message' => 'Not valid url, begin with e.g. https:// ... '],
            ['logo_file', 'file', 'extensions' => 'jpeg, jpg, gif, png', 'on' => ['update']],
            [['handphone'], 'validPhone'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Nama Pemilik',
            'company_name' => 'Nama Syarikat',
            'city' => 'Bandar',
            'state' => 'Negeri',
            'country' => 'Negara',
            'address' => 'Alamat',
            'website' => 'Website',
            'whatsapp' => 'Whatsapp',
            'instagram' => 'Instagram',
            'telegram' => 'Telegram',
            'tiktok' => 'Tiktok',
            'twitter' => 'Twitter',
            'office_phone' => 'No. Pejabat',
            'description' => 'Deskripsi',
            'handphone' => 'Handphone',
        ];
    }

    public function validPhone($attr)
    {
        //check format first
        //$attr = 'cl_phone1';
        $input = $this->$attr;
        $lg = strlen((string)$input);
        
        if($lg < 7){
            $this->addError($attr, 'The phone should be more than 7 numbers');
        }else if($lg > 20){
            $this->addError($attr, 'The phone is too long.');
        }else if(strpos((string)$input, '+') !== false){
            $this->addError($attr, 'Phone: To make it standard, please remove the plus sign');
        }else if(!Validation::dialCountryCode($input, $this->country)){
            $list = CountryCode::find()
            ->alias('a')
            ->select('c.country_name, a.dial_code')
            ->leftJoin('countries c', 'c.country_code = a.country_code')
            ->where(['c.id' => $this->country])
            ->one();
            $name = $list->country_name;
            $code = $list->dial_code;
            $this->addError($attr, 'Phone: Please include a valid country code for '. $name .' e.g. ' . $code . '134567890');
        }
    }

    public function getStateModel(){
        return $this->hasOne(Negeri::className(), ['id' => 'state']);
    }

    public function getCountryModel(){
        return $this->hasOne(Countries::className(), ['id' => 'country']);
    }

    public function getAddressPostal(){
        return $this->address . ' ' . $this->city . ' ' . $this->postcode . ' ' . $this->stateName . ' ' . $this->countryName;
    }

    public function getCountryName(){
        if($this->country > 0){
            return $this->countryModel->country_name;
        }
    }
    
    public function getStateName(){
        if($this->state > 0){
            return $this->stateModel->negeri_name;
        }
    }

    public function statusList(){
        return [0 => 'MOHON', 20 => 'AKTIF', 30 => 'TIDAK AKTIF'];
    }

    public function getStatusText(){
        if($this->status >= 0){
            return $this->statusList()[$this->status];
        }else{
            return '';
        }
    }

    public function getStatusColor(){
        if($this->status == 20){
            return '<span class="label label-success">'.$this->statusText.'</span>';
        }else if($this->status == 30){
            return '<span class="label label-danger">'.$this->statusText.'</span>';
        }else{
            return '<span class="label label-info">'.$this->statusText.'</span>';
        }
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
