<?php

namespace backend\modules\shop\models\query;

use backend\modules\shop\models\Order;

/**
 * This is the ActiveQuery class for [[\backend\modules\shop\models\Order]].
 *
 * @see \backend\modules\shop\models\Order
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function paid()
    {
        return $this->andWhere(['status' => [Order::STATUS_PAID, Order::STATUS_COMPLETED]]);
    }
}
