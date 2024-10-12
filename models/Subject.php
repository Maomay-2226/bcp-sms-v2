<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $subject_name
 * @property string $subject_code
 * @property string|null $description
 * @property int $credits
 *
 * @property SubjectInstructors[] $subjectInstructors
 * @property Enrollments[] $enrollments
 * @property Majors[] $majors
 * @property Schedule[] $schedules
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name', 'subject_code', 'credits', 'course_id'], 'required'],
            [['description'], 'string'],
            [['credits', 'course_id'], 'integer'],
            [['subject_name'], 'string', 'max' => 100],
            [['subject_code'], 'string', 'max' => 10],
            [['subject_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_name' => 'Name',
            'subject_code' => 'Code',
            'course_id' => 'Course',
            'description' => 'Description',
            'credits' => 'Credits',
        ];
    }
    
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[SubjectInstructors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectInstructors()
    {
        return $this->hasMany(SubjectInstructors::class, ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Majors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMajors()
    {
        return $this->hasMany(Majors::class, ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['subject_id' => 'id']);
    }

    public function getCourses()
    {
        $query = Course::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->course_title;
        }
        return $arr;
    }
}
