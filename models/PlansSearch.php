<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plans;

/**
 * PlansSearch represents the model behind the search form of `app\models\Plans`.
 */
class PlansSearch extends Plans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'deputat_id', 'status'], 'integer'],
            [['plan', 'baj', 'baj_date', 'ocenka', 'create_date', 'mod_date'], 'safe'],
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
        $query = Plans::find();

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
            'deputat_id' => $this->deputat_id,
            'baj_date' => $this->baj_date,
            'status' => $this->status,
            'create_date' => $this->create_date,
            'mod_date' => $this->mod_date,
        ]);

        $query->andFilterWhere(['like', 'plan', $this->plan])
            ->andFilterWhere(['like', 'baj', $this->baj])
            ->andFilterWhere(['like', 'ocenka', $this->ocenka]);

        return $dataProvider;
    }
}
