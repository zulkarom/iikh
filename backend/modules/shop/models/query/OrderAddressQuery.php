<?php

namespace backend\modules\shop\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\shop\models\OrderAddress]].
 *
 * @see \backend\modules\shop\models\OrderAddress
 */
class OrderAddressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\OrderAddress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\OrderAddress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
