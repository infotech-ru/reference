<?php

namespace infotech\reference;

/**
 * Class Generation
 * @package infotech\reference
 * @property integer $id_car_generation
 * @property string  $name
 * @property integer $model_id
 * @property string  $year_begin
 * @property string  $year_end
 * @property boolean $is_visible
 * @property integer $id_car_type
 * @property boolean $is_recent
 * @property integer $origin_id
 */
class Generation extends ActiveRecord
{
    public static function primaryKey()
    {
        return 'id_car_generation';
    }

    public static function tableName(): string
    {
        return 'car_generation';
    }

    public static function find()
    {
        return new GenerationQuery(get_called_class());
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSeries()
    {
        return $this->hasMany(Serie::class, ['id_car_generation' => 'id_car_generation']);
    }
}
