<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');

$urlHome = Url::to(['/product/index']);
?>

<div class="breadcrumb-wrap">
  <div class="banner">
    <img class="bg-img bg-top" src="<?=$dirAsset?>/images/inner-page/banner-p.jpg" />
    <div class="container-lg">
      <div class="breadcrumb-box">
        <div class="heading-box">
          <h1><?=$name ?></h1>
        </div>
        <ol class="breadcrumb">
          <li><a href="<?php echo Url::to(['/'])?>">Home</a></li>
          <li>
            <a href="<?php echo Url::to(['/'])?>"><i data-feather="chevron-right"></i></a>
          </li>
          <li class="current"><a href="javascript:void(0)"><?= nl2br(Html::encode($message)) ?></a></li>
        </ol>
      </div>
    </div>
  </div>
</div>