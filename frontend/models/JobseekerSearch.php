<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Jobseeker;

/**
 * JobseekerSearch represents the model behind the search form of `frontend\models\Jobseeker`.
 */
class JobseekerSearch extends Jobseeker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seekId', 'userId', 'age', 'newsSource'], 'integer'],
            [['fullName', 'educationLevel', 'fieldOfStudy', 'careerObjective', 'userImage', 'UploadCv', 'createdAt', 'updatedAt'], 'safe'],
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
        $query = Jobseeker::find();

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
            'seekId' => $this->seekId,
            'userId' => $this->userId,
            'age' => $this->age,
            'newsSource' => $this->newsSource,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'fullName', $this->fullName])
            ->andFilterWhere(['like', 'educationLevel', $this->educationLevel])
            ->andFilterWhere(['like', 'fieldOfStudy', $this->fieldOfStudy])
            ->andFilterWhere(['like', 'careerObjective', $this->careerObjective])
            ->andFilterWhere(['like', 'userImage', $this->userImage])
            ->andFilterWhere(['like', 'UploadCv', $this->UploadCv]);

        return $dataProvider;
    }
}
