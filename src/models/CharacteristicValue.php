<?php

namespace infotech\reference\models;

/**
 * Class CharacteristicValue
 * @package infotech\reference\models
 * @property integer $id_car_characteristic_value
 * @property string $value
 * @property string $unit
 * @property integer $id_car_characteristic
 * @property integer $id_car_modification
 * @property integer $id_car_equipment
 * @property boolean $is_visible
 * @property integer $id_car_type
 * @property integer $origin_id
 *
 * @property Characteristic $characteristic
 * @property Modification $modification
 * @property Equipment $equipment
 */
class CharacteristicValue extends ActiveRecord
{
    public static function primaryKey(): array
    {
        return ['id_car_characteristic_value'];
    }

    public static function tableName(): string
    {
        return 'car_characteristic_value';
    }

    public static function find()
    {
        return new CharacteristicValueQuery(static::class);
    }

    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::class, ['id_car_characteristic' => 'id_car_characteristic']);
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id_car_modification' => 'id_car_modification']);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id_car_equipment' => 'id_car_equipment']);
    }
}
