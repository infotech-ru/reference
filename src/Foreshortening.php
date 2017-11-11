<?php

namespace infotech\reference;

/**
 * Class Foreshortening
 * @package infotech\reference
 * @property integer $id
 * @property string  $name
 * @property integer $order
 * @property string  $created_at
 * @property string  $updated_at
 */
class Foreshortening extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_catalog_foreshortening';
    }

    public static function find()
    {
        return new ForeshorteningQuery(get_called_class());
    }
}