<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\shop\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
 <div class="box">
<div class="box-header"></div>
<div class="box-body">

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_gshoppe')->dropDownList(
        Category::is_gshoppe()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

