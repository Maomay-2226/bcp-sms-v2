<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "majors".
 *
 * @property int $id
 * @property int $course_id
 * @property string $code
 * @property string|null $description
 *
 * @property Course $course
 * @property Enrollments[] $enrollments
 */
class Majors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'majors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'description', 'code'], 'required'],
            [['course_id'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
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
            'course_id' => 'Course',
            'code' => 'Code',
            'description' => 'Description',
            'course.course_code' => 'Course',
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

    public function getCourses()
    {
        $query = Course::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->course_code;
        }
        return $arr;
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['major_id' => 'id']);
    }
}
