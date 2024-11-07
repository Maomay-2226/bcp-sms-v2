<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property int $id
 * @property string $code
 * @property int $year
 * @property string $semester
 * @property int $instructor_id
 * @property int $course_id
 * @property string|null $status
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'year', 'semester', 'instructor_id', 'course_id'], 'required'],
            [['year', 'instructor_id', 'course_id'], 'integer'],
            [['semester', 'status'], 'string'],
            [['code'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'year' => 'Year',
            'semester' => 'Semester',
            'instructor_id' => 'Adviser',
            'course_id' => 'Course',
            'status' => 'Status',
            'instructorInfo.fullname' => 'Adviser',
            'course.course_code' => 'Course'
        ];
    }

    

    public function getInstructorInfo()
    {
        return $this->hasOne(Instructors::class, ['id' => 'instructor_id']);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
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

    public function getCourses()
    {
        $query = Course::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->course_code;
        }
        return $arr;
    }
}
