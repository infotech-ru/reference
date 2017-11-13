<?php

namespace infotech\reference\models;

/**
 * Class Modification
 * @package infotech\reference\models
 * @property integer $id_car_modification
 * @property integer $id_car_serie
 * @property string $name
 * @property integer $start_production_year
 * @property integer $end_production_year
 * @property integer $drive_type
 * @property integer $engine_type
 * @property integer $transmission_type
 * @property boolean $is_visible
 * @property integer $id_car_type
 * @property integer $price_min
 * @property integer $price_max
 * @property string $package_code
 * @property boolean $is_recent
 * @property integer $origin_Id
 * @property boolean $is_deleted
 * @property-read Serie[] $series
 */
class Modification extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car_modification';
    }

    public static function primaryKey(): array
    {
        return ['id_car_modification'];
    }

    public static function find()
    {
        return new ModificationQuery(get_called_class());
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'id_car_serie']);
    }
}
