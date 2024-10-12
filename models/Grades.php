<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grades".
 *
 * @property int $id
 * @property int $enrollment_id
 * @property string|null $grade
 * @property string|null $comments
 *
 * @property Enrollments $enrollment
 */
class Grades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enrollment_id'], 'required'],
            [['enrollment_id'], 'integer'],
            [['comments'], 'string'],
            [['grade'], 'string', 'max' => 2],
            [['enrollment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Enrollments::class, 'targetAttribute' => ['enrollment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enrollment_id' => 'Enrollment ID',
            'grade' => 'Grade',
            'comments' => 'Comments',
        ];
    }

    /**
     * Gets query for [[Enrollment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollment()
    {
        return $this->hasOne(Enrollments::class, ['id' => 'enrollment_id']);
    }
}
