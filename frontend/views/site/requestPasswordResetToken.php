<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>
<div class="row g-0 ratio_asos">
  <div class="order-2 order-lg-1 col-lg-6">
    <div class="content-box">
      <div>
        <h5><?= Html::encode($this->title) ?> <span class="bg-theme-blue"></span></h5>

        <p>Please fill out your email. A link to reset password will be sent there.</p>


        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

  <div class="order-1 order-lg-2 col-lg-6">
    <div class="img-box">
      <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="banner" />
    </div>
  </div>
</div>
