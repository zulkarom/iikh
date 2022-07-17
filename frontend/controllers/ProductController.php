<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class ProductController extends Controller
{
    public $layout = '//main';
       

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        

        return $this->render('index', [
        ]);
    }
}