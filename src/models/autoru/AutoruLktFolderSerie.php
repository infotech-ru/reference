<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "eqt_autoru_lkt_folder_serie".
 *
 * @property int $folder_id
 * @property int $serie_id
 *
 * @property AutoruLkt $folder
 */
class AutoruLktFolderSerie extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_lkt_folder_serie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['folder_id', 'serie_id'], 'required'],
            [['folder_id', 'serie_id'], 'integer'],
            [['folder_id', 'serie_id'], 'unique', 'targetAttribute' => ['folder_id', 'serie_id']],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruLkt::className(), 'targetAttribute' => ['folder_id' => 'folder_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'folder_id' => 'Folder ID',
            'serie_id' => 'Serie ID',
        ];
    }
    
    public function getFolder()
    {
        return $this->hasOne(AutoruLkt::className(), ['id' => 'folder_id']);
    }
}
