<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $department_name
 * @property int|null $head_of_department
 *
 * @property Instructors $headOfDepartment
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_name'], 'required'],
            [['head_of_department'], 'integer'],
            [['department_name'], 'string', 'max' => 100],
            [['head_of_department'], 'exist', 'skipOnError' => true, 'targetClass' => Instructors::class, 'targetAttribute' => ['head_of_department' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => 'Department Name',
            'head_of_department' => 'Department Head',
            'departmentHead.fullname' => 'Department Head'
        ];
    }

    /**
     * Gets query for [[HeadOfDepartment]]. 
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentHead()
    {
        return $this->hasOne(Instructors::class, ['id' => 'head_of_department']);
    }

    public function getInstructors()
    {
        $query = Instructors::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->fullname;
        }
        return $arr;
    }
}
