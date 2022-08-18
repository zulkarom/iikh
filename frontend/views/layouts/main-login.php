<?php

use yii\helpers\Html;
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



    <title>i’IKHTIAR | Login</title>
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

<div class="main">
    <section class="page-body p-0">


    <div class="row g-0 ratio_asos">
          <div class="order-2 order-lg-1 col-lg-6">
            <div class="content-box">

       
        <?=$content?>

        </div>
          </div>

          <div class="order-1 order-lg-2 col-lg-6">
            <div class="img-box">
              <img class="bg-img" src="<?=$dirAsset?>/images/ikhtiar/produk/product-3.jpg" alt="banner" />
            </div>
          </div>
        </div>





    </section>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
