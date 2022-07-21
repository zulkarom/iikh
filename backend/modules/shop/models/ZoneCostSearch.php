<?php

namespace backend\modules\shop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\shop\models\ZoneCost;

/**
 * ZoneCostSearch represents the model behind the search form of `backend\modules\shop\models\ZoneCost`.
 */
class ZoneCostSearch extends ZoneCost
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'zone_id', 'product_id', 'qty_from', 'qty_to'], 'integer'],
            [['zone_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZoneCost::find()->where(['product_id' => $this->product_id])->orderBy('zone_id ASC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'zone_id' => $this->zone_id,
            'zone_price' => $this->zone_price,
            'qty_from' => $this->qty_from,
            'qty_to' => $this->qty_to,
        ]);

        return $dataProvider;
    }
}
