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
 * @property int $section_id
 * @property string $semester
 * @property float|null $grade
 * @property string $category
 * @property string $admission_type
 * @property string $modality
 * @property string $branch
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
            [['student_id', 'course_id', 'academic_year', 'section_id', 'semester', 'category', 'admission_type', 'modality', 'branch'], 'required'],
            [['student_id', 'course_id', 'major_id', 'academic_year', 'section_id'], 'integer'],
            [['semester', 'category', 'admission_type', 'modality', 'branch'], 'string'],
            [['grade'], 'number'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
            [['major_id'], 'exist', 'skipOnError' => true, 'targetClass' => Majors::class, 'targetAttribute' => ['major_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::class, 'targetAttribute' => ['student_id' => 'id']],
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
            'course_id' => 'Course ID',
            'major_id' => 'Major ID',
            'academic_year' => 'Academic Year',
            'section_id' => 'Section ID',
            'semester' => 'Semester',
            'grade' => 'Grade',
            'category' => 'Category',
            'admission_type' => 'Admission Type',
            'modality' => 'Modality',
            'branch' => 'Branch',
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

    public function getSection()
    {
        return $this->hasOne(Sections::class, ['id' => 'section_id']);
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

    public function getMajors()
    {
        $query = Majors::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->description;
        }
        return $arr;
    }

    public function getSections()
    {
        $query = Sections::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->course->course_code.'-'.$value->code;
        }
        return $arr;
    }
}
