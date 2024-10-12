<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instructors".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $hire_date
 *
 * @property SubjectInstructors[] $subjectInstructors
 * @property Departments[] $departments
 * @property Schedule[] $schedules
 */
class Instructors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instructors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'gender'], 'required'],
            [['hire_date'], 'safe'],
            [['first_name', 'last_name', 'middle_name', 'suffix', 'gender'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'suffix' => 'Suffix',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
            'hire_date' => 'Hire Date',
        ];
    }

    /**
     * Gets query for [[SubjectInstructors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectInstructors()
    {
        return $this->hasMany(SubjectInstructors::class, ['instructor_id' => 'id']);
    }

    public function getFullname()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::class, ['head_of_department' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['instructor_id' => 'id']);
    }
}
