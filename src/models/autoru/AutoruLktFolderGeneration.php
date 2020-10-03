<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "eqt_autoru_lkt_folder_generation".
 *
 * @property int $folder_id
 * @property int $generation_id
 *
 * @property AutoruLkt $folder
 */
class AutoruLktFolderGeneration extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_lkt_folder_generation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['folder_id', 'generation_id'], 'required'],
            [['folder_id', 'generation_id'], 'integer'],
            [['folder_id', 'generation_id'], 'unique', 'targetAttribute' => ['folder_id', 'generation_id']],
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
            'generation_id' => 'Generation ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFolder()
    {
        return $this->hasOne(AutoruLkt::class, ['folder_id' => 'folder_id']);
    }
}
