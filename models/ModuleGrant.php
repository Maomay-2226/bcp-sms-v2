<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_grant".
 *
 * @property int $id
 * @property string $module_description
 * @property string $condition_description
 * @property string|null $date_open
 * @property string|null $date_close
 * @property string $is_requested
 * @property string $is_approved
 * @property int $student_id
 * @property string|null $module_link
 */
class ModuleGrant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_grant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_list_id', 'student_id'], 'required'],
            [['date_open', 'date_close'], 'safe'],
            [['is_requested', 'is_approved'], 'string'],
            [['student_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module_list_id' => 'Module Title',
            'date_open' => 'Date Open',
            'date_close' => 'Date Close',
            'is_requested' => 'Is Requested',
            'is_approved' => 'Is Approved',
            'student_id' => 'Student ID',
            'moduleList.subject.subject_name' => 'Subject'
        ];
    }
    
    public function getModuleList()
    {
        return $this->hasOne(ModuleList::class, ['id' => 'module_list_id']);
    }

    public function getModuleLists()
    {
        $query = ModuleList::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->subject->subject_code.': '.$value->title;
        }
        return $arr;
    }
}
