<?php

use backend\modules\shop\models\Category;
use backend\modules\shop\models\Seller;
use dosamigos\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\shop\models\Company;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap4\ActiveForm */
?>


 <div class="card">

<div class="card-body">


<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <div class="row">
	<div class="col-md-6"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
	<div class="col-md-6"><?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'step' => '0.01'
    ]) ?></div>
</div>

    


    
    
<div class="row">
	<div class="col-md-4"><?= $form->field($model, 'weight')->textInput([
        'maxlength' => true,
    ]) ?></div>

	<div class="col-md-4"> <?= $form->field($model, 'ship_free')->dropDownList($model->shippingOptions)?></div>
</div>
    



    
    
       
    
      
    
   
    
    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap",
            "searchreplace visualblocks code fullscreen",
            "paste"
        ],
        'menubar' => false,
        'toolbar' => "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
    ]
]);?>

<?= $form->field($model, 'status')->dropDownList([1=>'Active', 0 => 'Inactive'])?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
</div>
