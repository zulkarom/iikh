<?php

namespace backend\modules\shop\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\shop\models\CartItem]].
 *
 * @see \backend\modules\shop\models\CartItem
 */
class CartItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\CartItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\CartItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param $userId
     * @return \backend\modules\shop\models\query\CartItemQuery
     */
    public function userId($userId)
    {
        return $this->andWhere(['created_by' => $userId]);
    }

    /**
     * @param $productId
     * @return \backend\modules\shop\models\query\CartItemQuery
     */
    public function productId($productId)
    {
        return $this->andWhere(['product_id' => $productId]);
    }
}
