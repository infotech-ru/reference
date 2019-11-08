<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruFolderGenerationsQuery;
use Yii;

/**
 * This is the model class for table "{{%autoru_folder_generations}}".
 *
 * @property int $id
 * @property int $folder_id
 * @property int $generation_id
 *
 * @property AutoruFolder $folder
 * @property AutoruFolder $generation
 */
class AutoruFolderGeneration extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%autoru_folder_generations}}';
    }
    
    public static function find()
    {
        return new AutoruFolderGenerationsQuery(static::class);
    }

    public function rules()
    {
        return [
            [['folder_id', 'generation_id'], 'integer'],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruFolder::class, 'targetAttribute' => ['folder_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'folder_id' => Yii::t('app', 'Folder ID'),
            'generation_id' => Yii::t('app', 'Generation ID'),
        ];
    }

    public function getFolder()
    {
        return $this->hasOne(AutoruFolder::class, ['id' => 'folder_id']);
    }

    public function getGeneration()
    {
        return $this->hasOne(AutoruFolder::class, ['id' => 'generation_id']);
    }
}
