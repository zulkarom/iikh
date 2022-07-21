<?php

namespace backend\modules\shop\controllers;

use Yii;
use backend\modules\shop\models\ShippingRate;
use backend\modules\shop\models\Zone;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShippingRateController implements the CRUD actions for ShippingRate model.
 */
class ShippingRateController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all ShippingRate models.
     * @return mixed
     */
    public function actionIndex($zone)
    {
        $zone = $this->findZone($zone);
        $dataProvider = new ActiveDataProvider([
            'query' => ShippingRate::find()->where(['zone_id' => $zone->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'zone' => $zone
        ]);
    }

    /**
     * Displays a single ShippingRate model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShippingRate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($zone)
    {
        $model = new ShippingRate();
        
        $zone = $this->findZone($zone);
        $model->zone_id = $zone->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'zone' => $zone->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'zone' => $zone
        ]);
    }

    /**
     * Updates an existing ShippingRate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'zone' => $model->zone_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShippingRate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $zone = $model->zone_id;
        $model->delete();

        return $this->redirect(['index', 'zone' => $zone]);
    }

    /**
     * Finds the ShippingRate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShippingRate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShippingRate::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findZone($id)
    {
        if (($model = Zone::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
