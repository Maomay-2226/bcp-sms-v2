<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_guardian".
 *
 * @property int $id
 * @property int $student_id
 * @property string $guardian_fname
 * @property string|null $guardian_mname
 * @property string $guardian_lname
 * @property string $guardian_contact
 * @property string $guardian_occupation
 * @property string|null $father_fname
 * @property string|null $father_mname
 * @property string|null $father_lname
 * @property string|null $father_contact
 * @property string|null $mother_fname
 * @property string|null $mother_mname
 * @property string|null $mother_lname
 * @property string|null $mother_contact
 */
class StudentGuardian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_guardian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'guardian_fname', 'guardian_lname', 'guardian_contact', 'guardian_occupation'], 'required'],
            [['student_id'], 'integer'],
            [['guardian_fname', 'guardian_mname', 'guardian_lname', 'guardian_occupation', 'father_fname', 'father_mname', 'father_lname', 'mother_fname', 'mother_mname', 'mother_lname'], 'string', 'max' => 100],
            [['guardian_contact', 'father_contact', 'mother_contact'], 'string', 'max' => 20],
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
            'guardian_fname' => 'Guardian Fname',
            'guardian_mname' => 'Guardian Mname',
            'guardian_lname' => 'Guardian Lname',
            'guardian_contact' => 'Guardian Contact',
            'guardian_occupation' => 'Guardian Occupation',
            'father_fname' => 'Father Fname',
            'father_mname' => 'Father Mname',
            'father_lname' => 'Father Lname',
            'father_contact' => 'Father Contact',
            'mother_fname' => 'Mother Fname',
            'mother_mname' => 'Mother Mname',
            'mother_lname' => 'Mother Lname',
            'mother_contact' => 'Mother Contact',
        ];
    }
}
