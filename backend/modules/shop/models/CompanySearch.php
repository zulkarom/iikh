<?php

namespace backend\modules\shop\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\shop\models\Company;

/**
 * CompanySearch represents the model behind the search form of `backend\modules\shop\models\Company`.
 */
class CompanySearch extends Company
{
    public $fullname;
    public $status;
    public $selected_json;
    public $bttn_type;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status', ], 'integer'],
            [['company_name'], 'safe'],
            [['fullname', 'selected_json', 'bttn_type'], 'string'],
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
        $query = Company::find()
        ->alias('c')
        ->joinWith('user');

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
        $query->andFilterWhere(['like', 'user.fullname', $this->fullname]);
        $query->andFilterWhere(['like', 'company_name', $this->company_name]);
        $query->andFilterWhere([
            'c.status' => $this->status,
        ]);


        return $dataProvider;
    }
}
