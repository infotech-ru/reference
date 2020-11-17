<?php

namespace infotech\reference\models;

/**
 * Class Foreshortening
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $order
 * @property string $created_at
 * @property string $updated_at
 * @property-read CatalogImage[] $catalogImages
 */
class CatalogForeshortening extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_catalog_foreshortening';
    }

    public static function find()
    {
        return new CatalogForeshorteningQuery(static::class);
    }

    public function getCatalogImages()
    {
        return $this->hasMany(CatalogImage::class, ['foreshortening_id' => 'id']);
    }
}
