<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "concern".
 *
 * @property int $id
 * @property int $student_id
 * @property int $concern_type_id
 * @property string $message
 * @property string $date
 */
class Concern extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concern';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'concern_type_id', 'message', 'date'], 'required'],
            [['student_id', 'concern_type_id'], 'integer'],
            [['message','answer'], 'string'],
            [['date','answer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'concern_type_id' => 'Type',
            'message' => 'Message',
            'answer' => 'Answer',
            'date' => 'Date',
        ];
    }
    
    public function getConcernType()
    {
        return $this->hasOne(ConcernType::class, ['id' => 'concern_type_id']);
    }

    public function getConcernTypes()
    {
        $query = ConcernType::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->description;
        }
        return $arr;
    }
}
