<?php

namespace infotech\reference\dictionaries;

use Yii;

class Engine
{
    public const  PETROL = 1;
    public const  DIESEL = 2;
    public const  HYBRID = 3;
    public const  ELECTRO = 4;

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
