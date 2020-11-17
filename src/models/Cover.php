<?php

namespace infotech\reference\models;

/**
 * Class Foreshortening
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $url
 */
class Cover extends ActiveRecord
{
    public static function tableName()
    {
        return 'cover';
    }
}
