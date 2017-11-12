<?php

namespace infotech\reference;


class Modification extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car_modification';
    }

    public static function primaryKey(): string
    {
        return 'id_car_modification';
    }

    public static function find()
    {
        return new ModificationQuery(get_called_class());
    }

    public function getSerie(): SerieQuery
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'id_car_serie']);
    }
}
