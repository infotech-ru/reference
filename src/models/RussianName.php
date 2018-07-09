<?php

namespace infotech\reference\models;

/**
 * Class RussianName
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $sex
 */
class RussianName extends ActiveRecord
{
    const MALE = 'M';
    const FEMALE = 'F';

    public static function tableName(): string
    {
        return 'russian_name';
    }

    public static function name2Sex($name)
    {
        $name = static::mb_ucfirst($name, \Yii::$app->charset);
        $models = static::find()->where('name = :name COLLATE utf8_bin', [':name' => $name])->all();
        if (count($models) != 1) {
            return null;
        }

        return reset($models)->sex;
    }

    private static function mb_ucfirst($string, $enc = 'UTF-8')
    {
        $string = mb_strtolower($string, $enc);

        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc).
            mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }

    public static function find()
    {
        return new RussianNameQuery(static::class);
    }

}