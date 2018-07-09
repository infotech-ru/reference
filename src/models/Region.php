<?php

namespace infotech\reference\models;

/**
 * Class City
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $country_id
 * @property integer $federal_district_id
 * @property string $name
 * @property Country $country
 * @property FederalDistrict $federalDistrict
 * @property City[] $cities
 */
class Region extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'regions';
    }

    public static function find()
    {
        return new RegionQuery(static::class);
    }

    public static function getList()
    {
        $query = static::find()
            ->select('name, id')
            ->indexBy('id');

        return $query->column();
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getFederalDistrict()
    {
        return $this->hasOne(FederalDistrict::class, ['id' => 'federal_district_id']);
    }

    public function getCities()
    {
        return $this->hasMany(City::class, ['region_id' => 'id']);
    }
}