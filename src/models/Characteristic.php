<?php

namespace infotech\reference\models;

/**
 * Class Characteristic
 * @package infotech\reference\models
 * @property integer $id_car_characteristic
 * @property string $name
 * @property integer $id_parent
 * @property integer $id_car_type
 * @property boolean $is_main
 * @property integer $origin_id
 * @property Characteristic $parent
 */
class Characteristic extends ActiveRecord
{
    public static function primaryKey(): array
    {
        return ['id_car_characteristic'];
    }

    public static function tableName(): string
    {
        return 'car_characteristic';
    }

    public static function find()
    {
        return new CharacteristicQuery(static::class);
    }

    public function getParent()
    {
        return $this->hasOne(self::class, ['id_car_characteristic' => 'parent_id']);
    }
}
