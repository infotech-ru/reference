<?php

namespace infotech\reference;

/**
 * Class Serie
 * @package infotech\reference
 */
class Serie extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car_serie';
    }

    public static function primaryKey(): string
    {
        return 'id_car_serie';
    }

    public static function find()
    {
        return new SerieQuery(get_called_class());
    }

    public function getGeneration(): GenerationQuery
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'id_car_generation']);
    }

    public function getBody(): BodyQuery
    {
        return $this->hasOne(Body::class, ['id' => 'body_id']);
    }

    public function getModifications(): ModificationQuery
    {
        return $this->hasMany(Modification::class, ['id_car_serie' => 'id_car_serie']);
    }

    public function getEquipments(): EquipmentQuery
    {
        return $this->hasMany(Equipment::class, ['series_id' => 'id_car_serie']);
    }

    public function getEmplacements(): EmplacementQuery
    {
        return $this->hasMany(Emplacement::class, ['serie_id' => 'id_car_serie']);
    }
}
