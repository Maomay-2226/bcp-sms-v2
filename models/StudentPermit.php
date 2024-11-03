<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_permit".
 *
 * @property int $id
 * @property int $enrollment_id
 * @property int $dp
 * @property int $prelim
 * @property int $midterm
 * @property int $final
 */
class StudentPermit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_permit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enrollment_id'], 'required'],
            [['enrollment_id', 'dp', 'prelim', 'midterm', 'final'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enrollment_id' => 'Enrollment ID',
            'dp' => 'Dp',
            'prelim' => 'Prelim',
            'midterm' => 'Midterm',
            'final' => 'Final',
        ];
    }
}
