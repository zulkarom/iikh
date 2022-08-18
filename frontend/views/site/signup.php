<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>


<div>
  <h5>PENDAFTARAN <span class="bg-theme-blue"></span></h5>
  <?=common\widgets\Alert::widget()?>

  <?php $form = ActiveForm::begin(
      [
          /*'options' => [
              'class' => 'custom-form form-pill'
          ]*/
      ]
  ); ?>

    <div class="input-box">
      
      <?= $form->field($model, 'fullname')->textInput(['id' => 'fullname', 'class' => 'form-control'])->label('Nama Penuh') ?>
    </div>

    <div class="input-box">
      
      <?= $form->field($model, 'email')->textInput(['id' => 'email', 'class' => 'form-control'])->label('Email') ?>
    </div>

    <div class="input-box">
      <div class="icon-input">
        
          <?= $form->field($model, 'password')->textInput(['id' => 'password', 'class' => 'form-control', 'type' => 'password'])->label('Kata Laluan') ?>
      </div>
    </div>

    <div class="input-box">
      <div class="icon-input">
        
          <?= $form->field($model, 'password_repeat')->textInput(['id' => 'password_repeat', 'class' => 'form-control', 'type' => 'password'])->label('Ulang Kata Laluan') ?>
      </div>
    </div>


    <?= Html::submitButton('Daftar <i class="arrow"></i>', ['class' => 'btn-solid rounded-pill line-none']) ?>

    <a href="<?php echo Url::to(['site/index'])?>" class="btn-solid rounded-pill line-none btn-outline mt-3 d-flex justify-content-center">Home <i class="arrow"></i></a>
  <?php ActiveForm::end(); ?>

  <span class="backto-link font-default content-color text-decoration-none">Sudah mempunyai akaun? <a class="text-decoration-underline theme-color" href="<?=Url::to(['site/login'])?>"> Log Masuk </a> </span>
</div>
            