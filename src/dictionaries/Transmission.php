<?php

namespace infotech\reference\dictionaries;

use Yii;

class Transmission
{
    const MANUAL = 1;
    const AUTOMATIC = 2;
    const VARIABLE = 3;
    const ROBOT = 4;

    public static function getList() : array
    {
        return [
            self::MANUAL => Yii::t('app', 'МКПП'),
            self::AUTOMATIC => Yii::t('app', 'АКПП'),
            self::VARIABLE => Yii::t('app', 'Вариатор'),
            self::ROBOT => Yii::t('app', 'Робот'),
        ];
    }
}
