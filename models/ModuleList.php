<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_list".
 *
 * @property int $id
 * @property string $description
 * @property string $instruction
 * @property int $subject_id
 * @property string $link
 *
 * @property ModuleGrant[] $moduleGrants
 */
class ModuleList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'instruction', 'link', 'subject_id'], 'required'],
            [['date_open', 'date_close'], 'safe'],
            [['description', 'instruction'], 'string'],
            [['link', 'title'], 'string', 'max' => 255],
            [['subject_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'instruction' => 'Instruction',
            'date_open' => 'Date Open',
            'date_close' => 'Date Close',
            'subject_id' => 'Subject',
            'link' => 'Link',
        ];
    }

    public function getModuleGrants()
    {
        return $this->hasMany(ModuleGrant::class, ['module_list_id' => 'id']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

    public function getSubjects()
    {
        $query = Subject::find()->all();
        $arr = [];
        foreach ($query as $key => $value) {
            $arr[$value->id] = $value->subject_name;
        }
        return $arr;
    }
}
