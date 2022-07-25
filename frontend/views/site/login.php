<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');

?>
<div class="row g-0 ratio_asos">
          <div class="order-2 order-lg-1 col-lg-6">
            <div class="content-box">
              <div>
                <h5>LOGIN <span class="bg-theme-blue"></span></h5>

                <?php $form = ActiveForm::begin(
                    [
                        /*'options' => [
                            'class' => 'custom-form form-pill'
                        ]*/
                    ]
                ); ?>

                  <div class="input-box">
                    
                    <?= $form->field($model, 'username')->textInput(['id' => 'username', 'class' => 'form-control'])->label('Email') ?>
                  </div>

                  <div class="input-box">
                    <div class="icon-input">
                      
                       <?= $form->field($model, 'password')->textInput(['id' => 'password', 'class' => 'form-control', 'type' => 'password'])->label('Password') ?>
                    </div>
                  </div>

                  <a class="forgot-link" href="forgot-password.html">Forgot Password?</a>
                  <?= Html::submitButton('Log Masuk <i class="arrow"></i>', ['class' => 'btn-solid rounded-pill line-none']) ?>

                  <a href="<?php echo Url::to(['site/index'])?>" class="btn-solid rounded-pill line-none btn-outline mt-3 d-flex justify-content-center">Home <i class="arrow"></i></a>
                <?php ActiveForm::end(); ?>

                <span class="backto-link font-default content-color text-decoration-none">Jika anda baru, <a class="text-decoration-underline theme-color" href="<?php echo Url::to(['site/signup'])?>"> Buat Akaun </a> </span>
              </div>
            </div>
          </div>

          <div class="order-1 order-lg-2 col-lg-6">
            <div class="img-box">
              <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="banner" />
            </div>
          </div>
        </div>
