<?php

namespace infotech\reference\models;

/**
 * Class Foreshortening
 * @package infotech\reference\models
 * @property integer $id
 * @property string  $name
 * @property integer $order
 * @property string  $created_at
 * @property string  $updated_at
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
}