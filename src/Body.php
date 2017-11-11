<?php

namespace infotech\reference;

/**
 * Class Body
 * @package infotech\reference
 * @property integer $id
 * @property string  $name
 * @property string  $tradein_code
 */
class Body extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'bodies';
    }

    public static function find()
    {
        return new BodyQuery(get_called_class());
    }
}