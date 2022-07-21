<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\shop\models\ZoneCost */

$this->title = 'Create Zone Cost';
$this->params['breadcrumbs'][] = ['label' => 'Zone Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-cost-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
