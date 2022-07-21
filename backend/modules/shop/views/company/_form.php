<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Countries;
use backend\models\Negeri;
/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body">

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">

            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'office_phone')->textInput() ?>

            <?= $form->field($model, 'description')->textarea(['rows' => '3'])?>

        </div>
    </div>

    

</div>
</div>
</div>

<div class="box">
    <div class="box-body">
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'address')->textarea(['rows' => '3'])?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'postcode') ?>
            </div>
            <div class="col-md-4">        
                <?= $form->field($model, 'city') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'state')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Negeri::find()->orderBy('negeri_name')->all(),'id', 'negeri_name'),
                    'options' => ['placeholder' => 'Pilih Negeri'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
            <div class="col-md-4">              
                <?php 
                if($model->isNewRecord){
                    $model->country = 158;
                }
                echo $form->field($model, 'country')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Countries::find()->all(),'id', 'country_name'),
                    'options' => ['placeholder' => 'Pilih Negara'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);?>
            </div>
        </div>

    </div>
</div>


<div class="box">
    <div class="box-header">
        <div class="box-title"> Contact & Media sosial</div>
    </div>
    <div class="box-body">
        <div class="profile-index">
            <div class="row">
                
                <div class="col-md-8">
                    <?= $form->field($model, 'website') ?>
                    <?= $form->field($model, 'whatsapp') ?>
                    <?= $form->field($model, 'telegram') ?>
                    <?= $form->field($model, 'facebook') ?>
                    <?= $form->field($model, 'instagram') ?>
                    <?= $form->field($model, 'tiktok') ?>
                    <?= $form->field($model, 'twitter') ?>
                </div>

            </div>


        </div>
    </div>
</div>

<div class="form-group">
    <?php if($model->isNewRecord){
        $model->status = 20;
    }
    
    
    ?><div class="row">
<div class="col-md-3">  <?= $form->field($model, 'status')->dropDownList(
    $model->statusList()
                    )->label('Status') ?></div>


</div>
        
</div>

 <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
