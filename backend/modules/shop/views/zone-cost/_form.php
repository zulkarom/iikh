<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\shop\models\Zone;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ZoneCost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="zone-cost-form">

<?php yii\widgets\Pjax::begin(['id' => 'ship-in']) ?>
    <?php $form = ActiveForm::begin(['id' => 'ship-form', 'options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'zone_id')
    ->dropDownList(ArrayHelper::map(Zone::find()->all(),'id', 'zone_name'), ['prompt' => 'Please Select' ]) ?>

    <?= $form->field($model, 'zone_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qty_from')->textInput() ?>

    <?= $form->field($model, 'qty_to')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>

</div>
