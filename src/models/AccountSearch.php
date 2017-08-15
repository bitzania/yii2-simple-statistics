<?php

namespace bitzania\statistic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use bitzania\statistic\models\Account;

/**
 * AccountSearch represents the model behind the search form of `bitzania\statistic\models\Account`.
 */
class AccountSearch extends Account
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'modified_by'], 'integer'],
            [['code', 'name', 'notes', 'tags', 'data', 'unit', 'created_on', 'modified_on'], 'safe'],
            [['balance'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Account::find();

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
            'balance' => $this->balance,
            'created_on' => $this->created_on,
            'modified_on' => $this->modified_on,
            'created_by' => $this->created_by,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
