<?php

namespace infotech\reference\models;

/**
 * Class SkinSerie
 * @package infotech\reference\models
 * @property integer $skin_id
 * @property integer $serie_id
 * @property-read Skin $skin
 * @property-read Serie $serie
 */
class SkinSerie extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'skin_serie';
    }

    public static function find()
    {
        return new SkinSerieQuery(static::class);
    }

    public function getSkin()
    {
        return $this->hasOne(Skin::class, ['id' => 'skin_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'serie_id']);
    }
}