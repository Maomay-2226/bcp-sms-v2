<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentPermit;

/**
 * StudentPermitSearch represents the model behind the search form of `app\models\StudentPermit`.
 */
class StudentPermitSearch extends StudentPermit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'enrollment_id', 'dp', 'prelim', 'midterm', 'final'], 'integer'],
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
        $query = StudentPermit::find();

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
            'enrollment_id' => $this->enrollment_id,
            'dp' => $this->dp,
            'prelim' => $this->prelim,
            'midterm' => $this->midterm,
            'final' => $this->final,
        ]);

        return $dataProvider;
    }
}
