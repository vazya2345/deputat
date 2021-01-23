<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Murojats;

/**
 * MurojatsSearch represents the model behind the search form of `app\models\Murojats`.
 */
class MurojatsSearch extends Murojats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'deputat_id', 'status'], 'integer'],
            [['murojatchi_name', 'murojatchi_contact', 'murojat_text', 'javob', 'create_date', 'mod_date'], 'safe'],
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
        $query = Murojats::find();

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
            'status' => $this->status,
            'create_date' => $this->create_date,
            'mod_date' => $this->mod_date,
        ]);

        $query->andFilterWhere(['like', 'murojatchi_name', $this->murojatchi_name])
            ->andFilterWhere(['like', 'murojatchi_contact', $this->murojatchi_contact])
            ->andFilterWhere(['like', 'murojat_text', $this->murojat_text])
            ->andFilterWhere(['like', 'javob', $this->javob]);

        return $dataProvider;
    }
}
