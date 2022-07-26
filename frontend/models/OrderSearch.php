<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form of `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ship_method', 'status', 'created_at', 'created_by', 'return_status', 'payment_created', 'settlement'], 'integer'],
            [['total_price', 'product_price', 'ship_cost', 'billAmount'], 'number'],
            [['pay_status', 'fullname', 'email', 'transaction_id', 'paypal_order_id', 'billcode', 'billName', 'billDescription', 'billTo', 'billPhone', 'return_response', 'callback_response', 'group_name', 'toyyib_refno', 'toyyib_reason', 'order_note', 'bank_code'], 'safe'],
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
        $query = Order::find()
        ->where(['created_by' => Yii::$app->user->identity->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
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
            'total_price' => $this->total_price,
            'product_price' => $this->product_price,
            'ship_method' => $this->ship_method,
            'ship_cost' => $this->ship_cost,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'return_status' => $this->return_status,
            'billAmount' => $this->billAmount,
            'payment_created' => $this->payment_created,
            'settlement' => $this->settlement,
        ]);

        $query->andFilterWhere(['like', 'pay_status', $this->pay_status])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'transaction_id', $this->transaction_id])
            ->andFilterWhere(['like', 'paypal_order_id', $this->paypal_order_id])
            ->andFilterWhere(['like', 'billcode', $this->billcode])
            ->andFilterWhere(['like', 'billName', $this->billName])
            ->andFilterWhere(['like', 'billDescription', $this->billDescription])
            ->andFilterWhere(['like', 'billTo', $this->billTo])
            ->andFilterWhere(['like', 'billPhone', $this->billPhone])
            ->andFilterWhere(['like', 'return_response', $this->return_response])
            ->andFilterWhere(['like', 'callback_response', $this->callback_response])
            ->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'toyyib_refno', $this->toyyib_refno])
            ->andFilterWhere(['like', 'toyyib_reason', $this->toyyib_reason])
            ->andFilterWhere(['like', 'order_note', $this->order_note])
            ->andFilterWhere(['like', 'bank_code', $this->bank_code]);

        return $dataProvider;
    }
}
