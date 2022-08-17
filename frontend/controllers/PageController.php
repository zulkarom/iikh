<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class PageController extends Controller
{   


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