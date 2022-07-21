<?php

namespace backend\modules\shop\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\shop\models\Product]].
 *
 * @see \backend\modules\shop\models\Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \backend\modules\shop\models\query\ProductQuery
     */
    public function published()
    {
        return $this->andWhere(['status' => 1])->orderBy('item_order ASC');
    }

    public function id($id)
    {
        return $this->andWhere(['id' => $id]);
    }
}
