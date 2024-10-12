<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enrollments".
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property int|null $major_id
 * @property int $academic_year
 * @property string $section
 * @property string $semester
 * @property float|null $grade
 *
 * @property Course $course
 * @property Grades[] $grades
 * @property Majors $major
 * @property Students $student
 */
class Enrollments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrollments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'semester'], 'required'],
            [['student_id', 'course_id', 'major_id', 'academic_year'], 'integer'],
            [['semester'], 'string'],
            [['grade'], 'number'],
            [['section'], 'string', 'max' => 20],
            [['major_id'], 'exist', 'skipOnError' => true, 'targetClass' => Majors::class, 'targetAttribute' => ['major_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::class, 'targetAttribute' => ['student_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
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
            'course_id' => 'Course',
            'major_id' => 'Major',
            'academic_year' => 'Academic Year',
            'section' => 'Section',
            'semester' => 'Semester',
            'grade' => 'Grade',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Grades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grades::class, ['enrollment_id' => 'id']);
    }

    /**
     * Gets query for [[Major]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Majors::class, ['id' => 'major_id']);
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
}
