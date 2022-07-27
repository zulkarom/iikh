<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use backend\modules\shop\models\ProductAttribute;
use kartik\form\ActiveForm;
use richardfan\widget\JSRegister;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card card-solid" id="product-info">
<div class="card-header">
<div class="card-title">Product Information</div>
</div>
<div class="card-body">




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'name',
                'options' => [
                    'style' => 'white-space: normal'
                ]
            ],
            'description:html',
            'price',
            'stock',
            'shipping',
            'weight',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($model){
                    return Html::tag('span', $model->status ? 'ACTIVE' : 'INACTIVE', [
                    'class' => $model->status ? 'label label-success' : 'label label-warning'
                ]);
                }
                
                
            ],

        ],
    ]) ?>
    <br />
       <div class="form-group">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    
</div>
</div>