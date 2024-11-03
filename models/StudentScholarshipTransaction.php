<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_scholarship_transaction".
 *
 * @property int $id
 * @property int $student_id
 * @property string $particular
 * @property float $amount
 * @property string $date
 * @property string|null $remarks
 */
class StudentScholarshipTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_scholarship_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'particular', 'amount', 'date'], 'required'],
            [['student_id'], 'integer'],
            [['particular', 'remarks'], 'string'],
            [['amount'], 'number'],
            [['date'], 'safe'],
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
            'particular' => 'Particular',
            'amount' => 'Amount',
            'date' => 'Date',
            'remarks' => 'Remarks',
        ];
    }
}
