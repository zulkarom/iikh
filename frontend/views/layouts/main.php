<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Breadcrumbs;
use frontend\assets\IkhtiarAsset;
use frontend\assets\AppAsset;

IkhtiarAsset::register($this);
AppAsset::register($this);
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="oslo" />
    <meta name="keywords" content="oslo" />
    <meta name="author" content="oslo" />
    <link rel="icon" href="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" type="image/x-icon" />
    <link rel="manifest" href="./manifest.json" />
    <link rel="icon" href="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?=$dirAsset?>/images/ikhtiar/logo/logo.png" />
    <meta name="theme-color" content="#0f8fac" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-title" content="Oslo" />
    <meta name="msapplication-TileImage" content="<?=$dirAsset?>/images/favicon/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?= Html::csrfMetaTags() ?>



    <title>i’IKHTIAR | Home</title>
    <?php $this->head() ?>
    
    <!-- Google Jost Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Google Monsterrat Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet" />

    <!-- Google Leckerli Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet" />
</head>
<body>
<?php $this->beginBody() ?>

<!-- Loader Start -->
    <!-- <div class="loader-wrapper">
      <div class="loader animate">
        <span>i’</span>
        <span>I</span>
        <span>K</span>
        <span>H</span>
        <span>T</span>
        <span>I</span>
        <span>A</span>
        <span>R</span>
      </div>
    </div> -->
    <!-- Loader End -->

    <!-- Overlay -->
    <a href="javascript:void(0)" class="overlay-general overlay-common"></a>

    <!-- Header Start -->
    <?=$this->render('header', [
        'dirAsset' => $dirAsset,
    ]);
    ?>
    <!-- Header End -->

    <!-- Content Start -->
    <main class="main">
        
        <?= Alert::widget() ?>
        <?=$content?>
    </main>
    <!-- Content End -->

    <!-- Footer Start -->
    <?=$this->render('footer', [
        'dirAsset' => $dirAsset,
    ]);
    ?>
    <!-- Footer End -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>