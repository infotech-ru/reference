<?php

namespace infotech\reference\dictionaries;

use Yii;

class Transmission
{
    public const  MANUAL = 1;
    public const  AUTOMATIC = 2;
    public const  VARIABLE = 3;
    public const  ROBOT = 4;

    public static function getList(): array
    {
        return [
            self::MANUAL => Yii::t('app', 'МКПП'),
            self::AUTOMATIC => Yii::t('app', 'АКПП'),
            self::VARIABLE => Yii::t('app', 'Вариатор'),
            self::ROBOT => Yii::t('app', 'Робот'),
        ];
    }
}
