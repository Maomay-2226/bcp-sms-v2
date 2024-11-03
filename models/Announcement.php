<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property int $id
 * @property string $announcement
 * @property string $date_to_post
 * @property string $date_to_expire
 * @property string $type
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'announcement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['announcement', 'date_to_post', 'date_to_expire', 'type'], 'required'],
            [['announcement', 'type'], 'string'],
            [['date_to_post', 'date_to_expire'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'announcement' => 'Announcement',
            'date_to_post' => 'Date To Post',
            'date_to_expire' => 'Date To Expire',
            'type' => 'Type',
        ];
    }
}
