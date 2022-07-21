<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\Zone */

$this->title = 'Create Shipping Zone';
$this->params['breadcrumbs'][] = ['label' => 'Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
