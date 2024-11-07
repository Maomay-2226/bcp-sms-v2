<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enrollments;

/**
 * EnrollmentsSearch represents the model behind the search form of `app\models\Enrollments`.
 */
class EnrollmentsSearch extends Enrollments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'course_id', 'major_id', 'academic_year', 'section_id'], 'integer'],
            [['semester', 'category', 'admission_type', 'modality', 'branch'], 'safe'],
            [['grade'], 'number'],
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
        $query = Enrollments::find();

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
            'course_id' => $this->course_id,
            'major_id' => $this->major_id,
            'academic_year' => $this->academic_year,
            'section_id' => $this->section_id,
            'grade' => $this->grade,
        ]);

        $query->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'admission_type', $this->admission_type])
            ->andFilterWhere(['like', 'modality', $this->modality])
            ->andFilterWhere(['like', 'branch', $this->branch]);

        return $dataProvider;
    }
}
