<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class RussianName
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $sex
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class RussianName extends ActiveRecord
{
    public const  MALE = 'M';
    public const  FEMALE = 'F';

    public static function tableName(): string
    {
        return 'russian_name';
    }

    public static function name2Sex($name)
    {
        $name = static::ucFirst($name, Yii::$app->charset);
        $models = static::find()->where('name = BINARY :name', [':name' => $name])->all();
        if (count($models) != 1) {
            return null;
        }

        return reset($models)->sex;
    }

    private static function ucFirst($string, $enc = 'UTF-8')
    {
        $string = mb_strtolower($string, $enc);
        $firstLetter = mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc);
        $lastLetters = mb_substr($string, 1, mb_strlen($string, $enc), $enc);
        return $firstLetter . $lastLetters;
    }

    public static function find()
    {
        return new RussianNameQuery(static::class);
    }
}
