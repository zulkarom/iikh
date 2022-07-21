<?php

namespace backend\modules\shop\models\query;

/**
 * This is the ActiveQuery class for [[\ backend\modules\shop\models\UserAddress]].
 *
 * @see \ backend\modules\shop\models\UserAddress
 */
class UserAddressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\UserAddress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\shop\models\UserAddress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
