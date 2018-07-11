<?php

namespace infotech\reference\models;

/**
 * Class FederalDistrict
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property string $okato
 * @property integer $status
 * @property integer $country_id
 * @property Region[] $regions
 * @property Country $country
 */
class FederalDistrict extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_DELETED = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => \Yii::t('app', 'Активно'),
            self::STATUS_DELETED => \Yii::t('app', 'Удалено'),
        ];
    }

    public static function tableName(): string
    {
        return 'federal_districts';
    }

    public static function find()
    {
        return new FederalDistrictQuery(static::class);
    }

    public function getRegions()
    {
        return $this->hasMany(Region::class, ['federal_district_id' => 'id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }
}
