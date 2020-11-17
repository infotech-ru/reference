<?php

namespace infotech\reference\models;

/**
 * Class Emplacement
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $serie_id
 * @property integer $color_id
 * @property boolean $is_main
 * @property string $created_at
 * @property string $updated_at
 * @property-read Model $model
 * @property-read Serie $serie
 * @property-read Color $color
 * @property-read Equipment $equipment
 * @property-read CatalogImage[] $catalogImages
 */
class CatalogEmplacement extends ActiveRecord
{
    /** @deprecated надо перейти на использование таблицы eqt_equipment_catalog_emplacement */
    public $equipment_id;

    public static function tableName(): string
    {
        return 'eqt_catalog_emplacement';
    }

    public static function find()
    {
        return new CatalogEmplacementQuery(static::class);
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

    public function getCatalogImages()
    {
        return $this->hasMany(CatalogImage::class, ['emplacement_id' => 'id']);
    }
}
