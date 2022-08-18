<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Tetapan semula kata laluan';
$this->params['breadcrumbs'][] = $this->title;

?>

      <div>
        <h5><?= Html::encode($this->title) ?> <span class="bg-theme-blue"></span></h5>
        <?=common\widgets\Alert::widget()?>

        <p>Sila isi maklumat email anda. Pautan untuk set semula kata laluan akan dihantar ke sana.</p>


        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Send', ['class' => 'btn-solid rounded-pill line-none']) ?>

            
        </div>

    <?php ActiveForm::end(); ?>

    <a href="<?php echo Url::to(['site/index'])?>" class="btn-solid rounded-pill line-none btn-outline mt-3 d-flex justify-content-center">Home <i class="arrow"></i></a>

      </div>
    