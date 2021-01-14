<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Kampuni;

/**
 * KampuniSearch represents the model behind the search form of `frontend\models\Kampuni`.
 */
class KampuniSearch extends Kampuni
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companyId', 'userId'], 'integer'],
            [['companyName', 'country', 'location', 'industry', 'website', 'telephone', 'companyImage', 'createdAt', 'updatedAt'], 'safe'],
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
        $query = Kampuni::find();

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
            'companyId' => $this->companyId,
            'userId' => $this->userId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'companyName', $this->companyName])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'industry', $this->industry])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'companyImage', $this->companyImage]);

        return $dataProvider;
    }
}
