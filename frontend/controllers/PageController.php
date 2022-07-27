<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use backend\models\Order;
use backend\models\OrderItem;
use backend\models\OrderAddress;
use backend\models\Product;
use backend\modules\shop\models\ShippingRate;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class PageController extends Controller
{   
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCatalog()
    {
        return $this->render('catalog');
    }

    public function actionBeOurPartner()
    {
        return $this->render('be-out-partner');
    }

    public function actionContactUs()
    {
        return $this->render('contact-us');
    }
}