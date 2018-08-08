<?php

namespace infotech\reference\models;

/**
 * Class Body
 * @package infotech\reference\models
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
        return new BodyQuery(static::class);
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->column();
    }
}