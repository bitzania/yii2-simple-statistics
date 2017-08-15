<?php

namespace bitzania\statistic\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use bitzania\statistic\models\Ledger;

/**
 * LedgerSearch represents the model behind the search form of `bitzania\statistic\models\Ledger`.
 */
class LedgerSearch extends Ledger
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'trx_id', 'created_by', 'modified_by'], 'integer'],
            [['account_code', 'trx_ref', 'trx_date', 'data', 'created_on', 'modified_on'], 'safe'],
            [['trx_value', 'balance_before', 'balance_after'], 'number'],
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
        $query = Ledger::find();

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
        var_dump($dataProvider);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'account_id' => $this->account_id,
            'trx_id' => $this->trx_id,
            'trx_date' => $this->trx_date,
            'trx_value' => $this->trx_value,
            'balance_before' => $this->balance_before,
            'balance_after' => $this->balance_after,
            'created_on' => $this->created_on,
            'modified_on' => $this->modified_on,
            'created_by' => $this->created_by,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'account_code', $this->account_code])
            ->andFilterWhere(['like', 'trx_ref', $this->trx_ref]);

        return $dataProvider;
    }
}
