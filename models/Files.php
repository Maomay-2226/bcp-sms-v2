<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $filename
 * @property string $extension
 * @property string $model
 * @property string $model_id
 * @property string $date_uploaded
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'], 'string', 'max' => 150],
            [['extension'], 'string', 'max' => 10],
            [['model', 'model_id', 'date_uploaded'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'extension' => 'Extension',
            'model' => 'Model',
            'model_id' => 'Model ID',
            'date_uploaded' => 'Date Uploaded',
        ];
    }
}
