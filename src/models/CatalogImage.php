<?php

namespace infotech\reference\models;

/**
 * Class Image
 * @package infotech\reference\models
 * @property integer $emplacement_id
 * @property integer $foreshortening_id
 * @property string  $url
 * @property boolean $is_main
 * @property boolean $is_serie_main
 * @property boolean $is_not_convert Флаг того, что изображение загружено без обработки
 * @property string  $created_at
 * @property string  $updated_at
 * @property-read CatalogEmplacement $catalogEmplacement
 * @property-read CatalogForeshortening $catalogForeshortening
 */
class CatalogImage extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_catalog_image';
    }

    public static function primaryKey()
    {
        return ['emplacement_id', 'foreshortening_id'];
    }

    public static function find()
    {
        return new CatalogImageQuery(static::class);
    }

    public function getCatalogEmplacement()
    {
        return $this->hasOne(CatalogEmplacement::class, ['id' => 'emplacement_id']);
    }

    public function getCatalogForeshortening()
    {
        return $this->hasOne(CatalogForeshortening::class, ['id' => 'foreshortening_id']);
    }
}