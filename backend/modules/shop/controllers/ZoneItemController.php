<?php

namespace backend\modules\shop\controllers;

use Yii;
use backend\modules\shop\models\Zone;
use backend\modules\shop\models\ZoneItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * ZoneItemController implements the CRUD actions for ZoneItem model.
 */
class ZoneItemController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all ZoneItem models.
     * @return mixed
     */
    public function actionIndex($zone)
    {
        $zone = $this->findZone($zone);
        
        $dataProvider = new ActiveDataProvider([
            'query' => ZoneItem::find()->where(['zone_id' => $zone->id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'zone' => $zone
        ]);
    }

    /**
     * Displays a single ZoneItem model.
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
     * Creates a new ZoneItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($zone)
    {
        $zone = $this->findZone($zone);
        
        $model = new ZoneItem();
        $model->zone_id = $zone->id;

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->save()){
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->redirect(['index', 'zone' => $zone->id]);

            }
            
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ZoneItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ZoneItem model.
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
     * Finds the ZoneItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZoneItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZoneItem::findOne($id)) !== null) {
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
