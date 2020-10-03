<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "eqt_autoru_lkt_folder_models".
 *
 * @property int $folder_id
 * @property int $model_id
 *
 * @property AutoruLkt $folder
 */
class AutoruLktFolderModels extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_lkt_folder_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['folder_id', 'model_id'], 'required'],
            [['folder_id', 'model_id'], 'integer'],
            [['folder_id', 'model_id'], 'unique', 'targetAttribute' => ['folder_id', 'model_id']],
            [
                ['folder_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => AutoruLkt::class,
                'targetAttribute' => ['folder_id' => 'folder_id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'folder_id' => 'Folder ID',
            'model_id' => 'Model ID',
        ];
    }

    public function getFolder()
    {
        return $this->hasOne(AutoruLkt::class, ['id' => 'folder_id']);
    }
}
