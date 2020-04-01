<?php

namespace infotech\reference\models;

/**
 * Class Country
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $phone_code
 * @property string $alias
 * @property float $nds
 * @property Region[] $regions
 * @property City[] $cities
 * @property EquipmentCountry[] $equipmentCountries
 * @property Equipment[] $equipments
 */
class Country extends ActiveRecord
{
    const RUSSIA_ID = 1;
    const BELARUS_ID = 2;
    const KAZAKHSTAN_ID = 7;
    const UKRAINE_ID = 785;

    public static function tableName(): string
    {
        return 'countries';
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->column();
    }

    public static function find()
    {
        return new CountryQuery(static::class);
    }

    public function getRegions()
    {
        return $this->hasMany(Region::class, ['country_id' => 'id']);
    }

    public function getCities()
    {
        return $this->hasMany(City::class, ['country_id' => 'id']);
    }

    public function getEquipmentCountries()
    {
        return $this->hasMany(EquipmentCountry::class, ['country_id' => 'id']);
    }

    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['id' => 'equipment_id'])->via('equipmentCountries');
    }
}
