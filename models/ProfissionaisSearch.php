<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profissional;

/**
 * ProfissionaisSearch represents the model behind the search form of `app\models\Profissional`.
 */
class ProfissionaisSearch extends Profissional
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Nome', 'Conselho', 'NumeroConselho', 'Nascimento', 'Status'], 'safe'],
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
        $query = Profissional::find();

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
            'ID' => $this->ID,
            'Nascimento' => $this->Nascimento,
        ]);

        $query->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'Conselho', $this->Conselho])
            ->andFilterWhere(['like', 'NumeroConselho', $this->NumeroConselho])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
