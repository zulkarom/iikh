<?php

namespace backend\modules\shop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    public $fullname;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'created_by'], 'integer'],
            [['total_price'], 'number'],
            [['fullname', 'email', 'transaction_id', 'paypal_order_id'], 'safe'],
        ];
    }

    public function fields()
    {
        return array_merge(parent::fields(), [
            'fullname' => function () {
                return $this->fullname;
            }
        ]);
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
        $query = Order::find()->where(['>=', 'status', 20]); //paid upwards

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->defaultOrder = ['created_at' => SORT_DESC];
        $dataProvider->sort->attributes['fullname'] = [
            'label' => 'Full Name',
            'asc' => ['fullname' => SORT_ASC, 'fullname' => SORT_ASC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }
        if ($this->fullname) {
            $query->andWhere("fullname LIKE :fullname", ['fullname' => "%{$this->fullname}%"]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'paypal_order_id', $this->paypal_order_id]);

        return $dataProvider;
    }
}
