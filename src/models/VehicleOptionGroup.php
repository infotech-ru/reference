<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class VehicleOptionGroup
 * @package infotech\reference\models
 *
 * @property integer             $id
 * @property string              $name
 * @property string              $code
 *
 * @property VehicleOptionType[] $types
 */
class VehicleOptionGroup extends ActiveRecord
{
    public const  CODE_MULTIMEDIA = 'multimedia';
    public const  CODE_COMFORT = 'comfort';
    public const  CODE_SAFETY = 'safety';
    public const  CODE_VISIBILITY = 'visibility';
    public const  CODE_EXTERIOR_ELEMENTS = 'exterior_elements';
    public const  CODE_ANTI_THEFT = 'anti_theft';
    public const  CODE_INTERIOR = 'interior';

    public static function tableName(): string
    {
        return 'vehicle_option_group';
    }

    public static function find()
    {
        return new VehicleOptionGroupQuery(static::class);
    }

    public static function getCodesList()
    {
        return [
            self::CODE_MULTIMEDIA => Yii::t('app', 'Мультимедиа'),
            self::CODE_COMFORT => Yii::t('app', 'Комфорт'),
            self::CODE_SAFETY => Yii::t('app', 'Безопасность'),
            self::CODE_VISIBILITY => Yii::t('app', 'Обзор'),
            self::CODE_EXTERIOR_ELEMENTS => Yii::t('app', 'Элементы экстерьера'),
            self::CODE_ANTI_THEFT => Yii::t('app', 'Защита от угона'),
            self::CODE_INTERIOR => Yii::t('app', 'Салон'),
        ];
    }

    public function getTypes()
    {
        return $this->hasMany(VehicleOptionType::class, ['group_id' => 'id']);
    }
}
