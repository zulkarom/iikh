<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class IkhtiarAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/ikhtiar';
    public $css = [
       //'css/vendors/bootstrap.css',
        'css/vendors/wow-animate.css',
        'css/vendors/swiper-bundle.min.css',
        'css/style.css',
        'css/khasiat.css',
        

    ];

    public $js = [
       // 'js/bootstrap/bootstrap.bundle.min.js',
        'js/feather/feather.min.js',
        'js/swiper-slider/swiper-bundle.min.js',
        'js/swiper-slider/swiper-custom.min.js',
        'js/timer.js',
        'js/active-class.js',
        'js/wow.js',
        'js/wow-custom.js',
        'js/password-showhide.js',
        'js/script.js',
        'js/user-dashboard-tab.js'
    ];


    public $depends = [
        'yii\web\YiiAsset',
         'yii\bootstrap5\BootstrapAsset',
    ];
}