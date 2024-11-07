<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_enrollment".
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property string|null $status
 * @property int $academic_year
 * @property string $semester
 * @property float|null $grade
 *
 * @property Students $student
 * @property Subject $subject
 */
class SubjectEnrollment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_enrollment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'subject_id', 'academic_year', 'schedule_id'], 'integer'],
            [['status', 'semester'], 'string'],
            [['semester'], 'required'],
            [['grade'], 'number'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::class, 'targetAttribute' => ['student_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
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
            'subject_id' => 'Subject ID',
            'status' => 'Status',
            'academic_year' => 'Academic Year',
            'semester' => 'Semester',
            'grade' => 'Grade',
            'schedule_id' => 'Schedule ID',
        ];
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::class, ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

    public function getSchedule()
    {
        return $this->hasOne(Schedule::class, ['id' => 'schedule_id']);
    }
}
