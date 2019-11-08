<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "eqt_autoru_lkt_folder_mark".
 *
 * @property int $folder_id
 * @property int $brand_id
 *
 * @property AutoruLkt $folder
 */
class AutoruLktFolderMark extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_lkt_folder_mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['folder_id', 'brand_id'], 'required'],
            [['folder_id', 'brand_id'], 'integer'],
            [['folder_id', 'brand_id'], 'unique', 'targetAttribute' => ['folder_id', 'brand_id']],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruLkt::className(), 'targetAttribute' => ['folder_id' => 'folder_id'],'message' => '@@@'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'folder_id' => 'Folder ID',
            'brand_id' => 'Brand ID',
        ];
    }
    
    public function getFolder()
    {
        return $this->hasOne(AutoruLkt::className(), ['id' => 'folder_id']);
    }
}
