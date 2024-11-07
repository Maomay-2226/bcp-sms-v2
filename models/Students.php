<?php

namespace app\models;
use dektrium\user\models\RegistrationForm;

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
    public $fileUploads,$selectedSubjects;
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
            [['fileUploads'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, png, jpg', 'maxFiles' => 10],
            [['first_name', 'last_name', 'email', 'status', 'gender', 'civil_status'], 'required'],
            [['date_of_birth', 'enrollment_date'], 'safe'],
            [['status', 'address'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 50],
            [['suffix'], 'string', 'max' => 10],
            [['gender','civil_status'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'unique'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->fileUploads as $file) {
                $filename = $this->id .'-'. $file->baseName . '.' . $file->extension;
                $file->saveAs('uploads/files/' . $filename);

                Yii::$app->db->createCommand()->insert('files', [
                    'filename' => $filename,
                    'extension' => $file->extension,
                    'model' => 'Students',
                    'model_id' => $this->id,
                    'date_uploaded' => date('Y-m-d'), // or another format you prefer
                ])->execute();
            }
            return true;
        } else {
            return false;
        }
    }

    // public function behaviors()
    // {
    //     return [
    //         'fileBehavior' => [
    //             'class' => \nemmo\attachments\behaviors\FileBehavior::className()
    //         ]
    //     ];
    // }

    public function beforeSave($insert)
    {
        if ($insert) {
            // Find the highest existing ID and increment it
            $maxId = (int) self::find()->max('id');
            $newId = ($maxId > 0) ? $maxId + 1 : 20000001;

            // Assign the 8-digit ID (starting from 20000001)
            $this->id = $newId;

            $registerAccount = \Yii::createObject(RegistrationForm::className());
            $registerAccount->username = 's'.$this->id;
            $registerAccount->email = $this->email;
            $registerAccount->password = 'pass'.$this->id;
            if(!$registerAccount->register()){
                print_r($registerAccount->getErrors());
                exit;
            }
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Student ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'suffix' => 'Suffix',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'email' => 'Email',
            'phone' => 'Phone',
            'enrollment_date' => 'Enrollment Date',
            'status' => 'Status',
            'address' => 'Address',
            'civil_status' => 'Civil Status',
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

    public function getSubjectEnrollment()
    {
        return $this->hasMany(SubjectEnrollment::class, ['student_id' => 'id']);
    }

    public function getFullname()
    {
        $middle_name = $this->middle_name ? $this->middle_name.' ' : '';
        return $this->first_name.' '.$middle_name.''.$this->last_name.' '.$this->suffix;
    }

    public function getUploadedFiles()
    {
        $files = Files::find()->where(['model' => 'Students', 'model_id' => $this->id])->all();
        return $files;
    }

    public function getSubjects($course_id)
    {
        $query = Subject::find()->where(['course_id' => $course_id])->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->subject_name;
        }
        return $arr;
    }
}
