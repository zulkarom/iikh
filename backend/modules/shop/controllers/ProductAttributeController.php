<?php

namespace backend\modules\shop\controllers;

use Yii;
use backend\modules\shop\models\Product;
use backend\modules\shop\models\ProductAttribute;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use backend\modules\shop\models\ProductPrice;

/**
 * ProductAttributeController implements the CRUD actions for ProductAttribute model.
 */
class ProductAttributeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    

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
     * Lists all ProductAttribute models.
     * @return mixed
     */
    

    /**
     * Displays a single ProductAttribute model.
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
     * Creates a new ProductAttribute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProductAttribute();
        $product = $this->findProduct($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->product_id = $product->id;
            
            //maybe have transaction?
            if($model->save()){
                //kena masuk table price
                $this->updateAttrMix($product);
                return $this->redirect(['product/view', 'id' => $product->id, 'tab' => 'attr']);
            }
            
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }
    
    public function updateAttrMix($product){
        ProductPrice::updateAll(['scheck' => 1], ['product_id' => $product->id]);
        $list = $product->attrCombinations();
        if($list){
            foreach($list as $arr){
                if(!is_array($arr)){
                    $arr = [$arr];
                }
                
                $json = json_encode($arr);
                
                $ada = ProductPrice::findOne(['product_id' => $product->id, 'attr_mix' => $json]);
                if($ada){
                    $ada->scheck = 0;
                    $ada->save();
                }else{
                    $price = new ProductPrice();
                    $price->attr_mix = json_encode($arr);
                    $price->product_id =  $product->id;
                    $price->price = $product->price;
                    $price->scheck = 0;
                    $price->save();
                }
                
            }
        }
        
        ProductPrice::deleteAll(['scheck' => 1, 'product_id' => $product->id]);
    }

    /**
     * Updates an existing ProductAttribute model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product/view', 'id' => $model->product->id, 'tab' => 'attr']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductAttribute model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        
        $this->updateAttrMix($model->product);

        return $this->redirect(['product/view', 'id' => $model->product->id, 'tab' => 'attr']);
    }

    /**
     * Finds the ProductAttribute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductAttribute the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductAttribute::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findProduct($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
