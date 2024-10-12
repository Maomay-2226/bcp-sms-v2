<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $suffix
 * @property string|null $date_of_birth
 * @property string $email
 * @property string|null $phone
 * @property string|null $enrollment_date
 * @property string $status
 *
 * @property Enrollments[] $enrollments
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'status', 'gender'], 'required'],
            [['date_of_birth', 'enrollment_date'], 'safe'],
            [['status'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 50],
            [['suffix'], 'string', 'max' => 10],
            [['gender'], 'string', 'max' => 10],
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
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'suffix' => 'Suffix',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'email' => 'Email',
            'phone' => 'Phone',
            'enrollment_date' => 'Enrollment Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['student_id' => 'id']);
    }

    public function getFullname()
    {
        $middle_name = $this->middle_name ? $this->middle_name.' ' : '';
        return $this->first_name.' '.$middle_name.''.$this->last_name.' '.$this->suffix;
    }
}
