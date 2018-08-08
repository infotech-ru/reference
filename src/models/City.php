<?php

namespace infotech\reference\models;

/**
 * Class City
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 * @property string $timezone
 * @property double $lat
 * @property double $lng
 * @property Country $country
 * @property Region $region
 */
class City extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'cities';
    }

    public static function find()
    {
        return new CityQuery(static::class);
    }

    public static function getList($regionId)
    {
        $query = static::find()
            ->region($regionId)
            ->select('name, id')
            ->indexBy('id');

        return $query->column();
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}