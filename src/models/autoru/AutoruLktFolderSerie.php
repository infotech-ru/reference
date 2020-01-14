<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "eqt_autoru_lkt_folder_serie".
 *
 * @property int $folder_id
 * @property int $serie_id
 * @property int $body_type
 *
 * @property AutoruLkt $folder
 */
class AutoruLktFolderSerie extends ActiveRecord
{
    const BODY_TYPES = [
        0  => 'Автотопливозаправщик',
        1  => 'Бортовой грузовик',
        2  => 'Бортовой с КМУ',
        3  => 'Борт-тент',
        4  => 'Изотермический кузов',
        5  => 'Кемпер',
        6  => 'Микроавтобус',
        7  => 'Пикап',
        8  => 'Промтоварный автофургон',
        9  => 'Рефрижератор',
        10 => 'Самосвал',
        11 => 'Скорая помощь',
        12 => 'Фургон для торговли',
        13 => 'Цельнометаллический фургон',
        14 => 'Цистерна',
        15 => 'Шасси',
        16 => 'Эвакуатор',
    ];

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
            [['body_type'], 'in', 'range' => array_keys(self::BODY_TYPES)],
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
            'body_type' => 'Тип кузова',
        ];
    }
    
    public function getFolder()
    {
        return $this->hasOne(AutoruLkt::className(), ['id' => 'folder_id']);
    }
}
