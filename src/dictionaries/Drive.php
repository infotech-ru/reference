<?php

namespace infotech\reference\dictionaries;

use Yii;

class Drive
{
    const FRONT = 1;
    const REAR = 2;
    const ALL = 3;

    public static function getList() : array
    {
        return [
            self::FRONT => Yii::t('app','Передний'),
            self::REAR => Yii::t('app','Задний'),
            self::ALL => Yii::t('app','Полный'),
        ];
    }
}