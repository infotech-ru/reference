<?php

namespace infotech\reference\models;

/**
 * Class Serie
 * @package infotech\reference\models
 */
class Serie extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car_serie';
    }

    public static function primaryKey(): array
    {
        return ['id_car_serie'];
    }

    public static function find()
    {
        return new SerieQuery(get_called_class());
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'id_car_generation']);
    }

    public function getBody()
    {
        return $this->hasOne(Body::class, ['id' => 'body_id']);
    }

    public function getModifications()
    {
        return $this->hasMany(Modification::class, ['id_car_serie' => 'id_car_serie']);
    }

    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['series_id' => 'id_car_serie']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['serie_id' => 'id_car_serie']);
    }
}
