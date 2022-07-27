<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Zone */
/* @var $form yii\widgets\ActiveForm */
?>

 <div class="card">

<div class="card-body">

<div class="zone-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'zone_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>

