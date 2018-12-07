<?php

namespace infotech\reference\models;

/**
 * Class EquipmentCountry
 * @package infotech\reference\models
 * @property integer $country_id
 * @property string $equipment_id
 * @property-read Equipment $equipment
 * @property-read Country $country
 */
class EquipmentCountry extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_equipment_country';
    }

    public static function find()
    {
        return new EquipmentCountryQuery(static::class);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }
}