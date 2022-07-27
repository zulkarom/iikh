<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Countries;
use kartik\select2\Select2;
use backend\models\Negeri;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ZoneCost */
/* @var $form yii\widgets\ActiveForm */
?>
	 <div class="card">
<div class="card-body">

<div class="row">
	<div class="col-md-6">
	

<div class="zone-cost-form">

    <?php $form = ActiveForm::begin(['id' => 'ship-form', 'options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'state_id')
    ->dropDownList(ArrayHelper::map(Negeri::find()->all(),'id', 'negeri_name'), ['prompt' => 'Please Select' ]) ?>


	<?php 

	if($model->isNewRecord){
	    $model->country_code = 'MY';
	}
echo $form->field($model, 'country_code')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Countries::find()->all(),'country_code', 'country_name'),
    'options' => ['placeholder' => 'Select a country ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

?>
	

    <div class="form-group">
        <?= Html::submitButton('Add Location', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>


	
	
	</div>
	<div class="col-md-6"></div>
</div>

</div>
</div>
