<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Announcement;

/**
 * AnnouncementSearch represents the model behind the search form of `app\models\Announcement`.
 */
class AnnouncementSearch extends Announcement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['announcement', 'date_to_post', 'date_to_expire', 'type'], 'safe'],
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
        $query = Announcement::find();

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
            'date_to_post' => $this->date_to_post,
            'date_to_expire' => $this->date_to_expire,
        ]);

        $query->andFilterWhere(['like', 'announcement', $this->announcement])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
