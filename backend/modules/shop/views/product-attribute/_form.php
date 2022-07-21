<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\shop\models\Attribute;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ProductAttribute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attribute-form">


<?php yii\widgets\Pjax::begin(['id' => 'attr-in']) ?>


    <?php $form = ActiveForm::begin(['id' => 'attribute-form', 'options' => ['data-pjax' => true]]); ?>


    <?= $form->field($model, 'attr_id')
    ->dropDownList(ArrayHelper::map(Attribute::find()->all(),'id', 'attr_name'), ['prompt' => 'Please Select' ]) ?>

    <?= $form->field($model, 'attr_value')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>
