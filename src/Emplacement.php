<?php

namespace infotech\reference;

/**
 * Class Emplacement
 * @package infotech\reference
 * @property integer $id
 * @property integer $model_id
 * @property integer $serie_id
 * @property integer $color_id
 * @property integer $equipment_id
 * @property boolean $is_main
 * @property string  $created_at
 * @property string  $updated_at
 */
class Emplacement extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_catalog_emplacement';
    }

    public static function find()
    {
        return new EmplacementQuery(get_called_class());
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'serie_id']);
    }

    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'color_id']);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }
}