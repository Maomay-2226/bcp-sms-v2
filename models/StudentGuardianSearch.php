<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentGuardian;

/**
 * StudentGuardianSearch represents the model behind the search form of `app\models\StudentGuardian`.
 */
class StudentGuardianSearch extends StudentGuardian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id'], 'integer'],
            [['guardian_fname', 'guardian_mname', 'guardian_lname', 'guardian_contact', 'guardian_occupation', 'father_fname', 'father_mname', 'father_lname', 'father_contact', 'mother_fname', 'mother_mname', 'mother_lname', 'mother_contact'], 'safe'],
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
        $query = StudentGuardian::find();

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
            'student_id' => $this->student_id,
        ]);

        $query->andFilterWhere(['like', 'guardian_fname', $this->guardian_fname])
            ->andFilterWhere(['like', 'guardian_mname', $this->guardian_mname])
            ->andFilterWhere(['like', 'guardian_lname', $this->guardian_lname])
            ->andFilterWhere(['like', 'guardian_contact', $this->guardian_contact])
            ->andFilterWhere(['like', 'guardian_occupation', $this->guardian_occupation])
            ->andFilterWhere(['like', 'father_fname', $this->father_fname])
            ->andFilterWhere(['like', 'father_mname', $this->father_mname])
            ->andFilterWhere(['like', 'father_lname', $this->father_lname])
            ->andFilterWhere(['like', 'father_contact', $this->father_contact])
            ->andFilterWhere(['like', 'mother_fname', $this->mother_fname])
            ->andFilterWhere(['like', 'mother_mname', $this->mother_mname])
            ->andFilterWhere(['like', 'mother_lname', $this->mother_lname])
            ->andFilterWhere(['like', 'mother_contact', $this->mother_contact]);

        return $dataProvider;
    }
}
