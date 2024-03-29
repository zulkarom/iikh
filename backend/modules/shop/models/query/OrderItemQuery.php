<?php

namespace backend\modules\shop\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\OrderItem]].
 *
 * @see \common\models\OrderItem
 */
class OrderItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\OrderItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\OrderItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
