<?php

namespace backend\modules\shop\controllers;

use Yii;
use backend\modules\shop\models\Product;
use backend\modules\shop\models\ProductPrice;
use backend\modules\shop\models\ProductSearch;
use backend\modules\shop\models\ProductImage;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use backend\modules\shop\models\ProductAttributeSearch;
use common\models\Model;
use yii\db\Expression;
use yii\helpers\Json;
use common\models\UploadFile;



/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            

            if ($searchModel->load(Yii::$app->request->post())) {
                $post = Yii::$app->request->post();

                $selection = json_decode($searchModel->selected_json);
                
                foreach($selection as $select){
                    $product = $this->findModel($select);

                    
                    $product->status = 0;
                    
                    if(!$product->save()){
                       $product->flashError(); 
                    }
                }
            
                Yii::$app->session->addFlash('success', "Data Updated");
                return $this->refresh();
            }
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        $searchModel = new ProductAttributeSearch();
        $searchModel->product_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$images = ProductImage::getImages($id);
        $prices = ProductPrice::find()->where(['product_id' => $id])->all();
        
        if (Model::loadMultiple($prices, Yii::$app->request->post()) && 
		Model::validateMultiple($prices)) {
            foreach ($prices as $price) {
                $price->save(false);
            }
            Yii::$app->session->addFlash('success', "Data Updated");

            return $this->redirect(['view', 'id' => $id, 'tab' => 'price']);
        }
        
        
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'prices' => $prices,
			'images' => $images
        ]);
    }
    


    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    


    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       /* $model->imageFile = UploadedFile::getInstance($model, 'imageFile');*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', "Data Updated");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findImage($id)
    {
        if (($model = ProductImage::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionUploadImage($id){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = $this->findImage($id);
        $model->file_controller = 'product';
        $seller = $model->product->seller_id;
        $path = 'shop/' . $seller ;
        $directory = Yii::getAlias('@upload/' . $path . '/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }
        
        $fileName = $id . '.png';
        $filePath = $directory . $fileName;
        
        
        $model->product_file = $path . '/' . $fileName ;
        $model->updated_at = new Expression('NOW()');
        $err = 'tiada';
        if(!$model->save()){
            $err = $model->flashError();
        }
        
        $post = Yii::$app->request->post('image');
        $image_parts = explode(";base64,", $post);
        $image_type_aux = explode("image/", $image_parts[0]);
        
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents($filePath, $image_base64);
        return [
                'url' => $path . '/' . $fileName,
                'err' => $err
        ];
        
    }
    
    public function actionProductImage($id){
        $model = $this->findImage($id);
        
        $file = Yii::getAlias('@upload/' . $model->product_file);
        
        if($model->product_file){
            if (file_exists($file)) {
                $ext = pathinfo($model->product_file, PATHINFO_EXTENSION);
                
                $filename = $id . '.' . $ext ;
                
                UploadFile::sendFile($file, $filename, $ext);
                
                
            }else{
                echo 'file not exist!';
            }
        }else{
            echo 'file not exist!';
        }
    }
}
