<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $instructor_id
 * @property string $day_of_week
 * @property string $start_time
 * @property string $end_time
 *
 * @property Subject $subject
 * @property Instructors $instructor
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'instructor_id', 'day_of_week', 'start_time', 'end_time'], 'required'],
            [['subject_id', 'instructor_id'], 'integer'],
            [['day_of_week','room_no'], 'string'],
            [['start_time', 'end_time'], 'safe'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instructors::class, 'targetAttribute' => ['instructor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject',
            'instructor_id' => 'Instructor',
            'day_of_week' => 'Day of Week',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'room_no' => 'Room',
            'instructor.fullname' => 'Instructor',
        ];
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

    /**
     * Gets query for [[Instructor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructors::class, ['id' => 'instructor_id']);
    }

    public function getSubjects()
    {
        $query = Subject::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->subject_name;
        }
        return $arr;
    }

    public function getInstructors()
    {
        $query = Instructors::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->fullname;
        }
        return $arr;
    }
}
