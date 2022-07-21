<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ShippingRate */
/* @var $form yii\widgets\ActiveForm */
?>

 <div class="card">
<div class="card-header"></div>
<div class="card-body">

<div class="shipping-rate-form">


    <?php $form = ActiveForm::begin(); ?>
    
    
    <div class="row">
	<div class="col-md-3">    <?= $form->field($model, 'weight_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight_to')->textInput(['maxlength' => true]) ?>
    
    

<?= $form->field($model, 'ship_cost', [
    'addon' => ['prepend' => ['content'=> 'RM']]

]); ?>
    
    
    </div>
	<div class="col-md-6"></div>
</div>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>


