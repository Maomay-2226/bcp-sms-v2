<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModuleGrant;

/**
 * ModuleGrantSearch represents the model behind the search form of `app\models\ModuleGrant`.
 */
class ModuleGrantSearch extends ModuleGrant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'student_id'], 'integer'],
            [['module_description', 'condition_description', 'date_open', 'date_close', 'is_requested', 'is_approved', 'module_link'], 'safe'],
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
        $query = ModuleGrant::find();

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
            'date_open' => $this->date_open,
            'date_close' => $this->date_close,
            'student_id' => $this->student_id,
        ]);

        $query->andFilterWhere(['like', 'module_description', $this->module_description])
            ->andFilterWhere(['like', 'condition_description', $this->condition_description])
            ->andFilterWhere(['like', 'is_requested', $this->is_requested])
            ->andFilterWhere(['like', 'is_approved', $this->is_approved])
            ->andFilterWhere(['like', 'module_link', $this->module_link]);

        return $dataProvider;
    }
}
