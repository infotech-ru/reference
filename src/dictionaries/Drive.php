<?php

namespace infotech\reference\dictionaries;

use Yii;

class Drive
{
    public const FRONT = 1;
    public const REAR = 2;
    public const ALL = 3;

    public static function getList(): array
    {
        return [
            self::FRONT => Yii::t('app', 'Передний'),
            self::REAR => Yii::t('app', 'Задний'),
            self::ALL => Yii::t('app', 'Полный'),
        ];
    }
}
