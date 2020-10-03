<?php

namespace infotech\reference\dictionaries;

use Yii;

class Engine
{
    const PETROL = 1;
    const DIESEL = 2;
    const HYBRID = 3;
    const ELECTRO = 4;

    public static function getList(): array
    {
        return [
            self::PETROL => Yii::t('app', 'Бензин'),
            self::DIESEL => Yii::t('app', 'Дизель'),
            self::HYBRID => Yii::t('app', 'Гибрид'),
            self::ELECTRO => Yii::t('app', 'Электро'),
        ];
    }
}
