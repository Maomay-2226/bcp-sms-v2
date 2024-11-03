<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_scholarship".
 *
 * @property int $id
 * @property int $student_id
 * @property float $scholarship_grant
 */
class StudentScholarship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_scholarship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'scholarship_grant'], 'required'],
            [['student_id'], 'integer'],
            [['scholarship_grant'], 'number'],
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
            'scholarship_grant' => 'Scholarship Grant',
        ];
    }
}
