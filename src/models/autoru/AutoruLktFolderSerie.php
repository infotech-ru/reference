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
    public const  BODY_TYPE_TANKER = 0;
    public const  BODY_TYPE_FLATBED_TRUCK = 1;
    public const  BODY_TYPE_LOADER_TRUCK = 2;
    public const  BODY_TYPE_TILT_TRUCK = 3;
    public const  BODY_TYPE_ISOTHERMAL = 4;
    public const  BODY_TYPE_CAMPER = 5;
    public const  BODY_TYPE_MINIBUS = 6;
    public const  BODY_TYPE_PICKUP = 7;
    public const  BODY_TYPE_MANUFACTURED = 8;
    public const  BODY_TYPE_REFRIGERATOR = 9;
    public const  BODY_TYPE_DUMP_TRUCK = 10;
    public const  BODY_TYPE_AMBULANCE = 11;
    public const  BODY_TYPE_WAGON_TRADE = 12;
    public const  BODY_TYPE_ALL_METAL = 13;
    public const  BODY_TYPE_TANK = 14;
    public const  BODY_TYPE_CHASSIS = 15;
    public const  BODY_TYPE_TOW_TRUCK = 16;

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
            [['body_type'], 'in', 'range' => array_keys(self::getBodyTypesAliases())],
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

    public static function getBodyTypesAliases()
    {
        return [
            self::BODY_TYPE_TANKER        => 'Автотопливозаправщик',
            self::BODY_TYPE_FLATBED_TRUCK => 'Бортовой грузовик',
            self::BODY_TYPE_LOADER_TRUCK  => 'Бортовой с КМУ',
            self::BODY_TYPE_TILT_TRUCK    => 'Борт-тент',
            self::BODY_TYPE_ISOTHERMAL    => 'Изотермический кузов',
            self::BODY_TYPE_CAMPER        => 'Кемпер',
            self::BODY_TYPE_MINIBUS       => 'Микроавтобус',
            self::BODY_TYPE_PICKUP        => 'Пикап',
            self::BODY_TYPE_MANUFACTURED  => 'Промтоварный автофургон',
            self::BODY_TYPE_REFRIGERATOR  => 'Рефрижератор',
            self::BODY_TYPE_DUMP_TRUCK    => 'Самосвал',
            self::BODY_TYPE_AMBULANCE     => 'Скорая помощь',
            self::BODY_TYPE_WAGON_TRADE   => 'Фургон для торговли',
            self::BODY_TYPE_ALL_METAL     => 'Цельнометаллический фургон',
            self::BODY_TYPE_TANK          => 'Цистерна',
            self::BODY_TYPE_CHASSIS       => 'Шасси',
            self::BODY_TYPE_TOW_TRUCK     => 'Эвакуатор',
        ];
    }
}
