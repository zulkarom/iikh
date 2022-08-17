<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Set Kata Laluan Baru';
$this->params['breadcrumbs'][] = $this->title;


$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

      <div>
        <h5><?= Html::encode($this->title) ?> <span class="bg-theme-blue"></span></h5>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn-solid rounded-pill line-none']) ?>
                </div>

            <?php ActiveForm::end(); ?>
      </div>
   