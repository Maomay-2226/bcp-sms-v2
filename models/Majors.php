<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "majors".
 *
 * @property int $id
 * @property int $subject_id
 * @property string $code
 * @property string|null $description
 *
 * @property Subject $subject
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
            [['id', 'subject_id', 'code'], 'required'],
            [['id', 'subject_id'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'subject_id' => 'Subject ID',
            'code' => 'Code',
            'description' => 'Description',
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
     * Gets query for [[Enrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnrollments()
    {
        return $this->hasMany(Enrollments::class, ['major_id' => 'id']);
    }
}
