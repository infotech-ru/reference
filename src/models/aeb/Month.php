<?php

namespace infotech\reference\models\aeb;

use Yii;

/**
 * Class Month
 * @package app\models
 */
class Month
{
    /**
     * @param null $quarter
     * @return array
     */
    public static function getList($quarter = null)
    {
        static $months;
        if (null === $months) {
            $months = [
                1 => Yii::t('app', 'Январь'),
                2 => Yii::t('app', 'Февраль'),
                3 => Yii::t('app', 'Март'),
                4 => Yii::t('app', 'Апрель'),
                5 => Yii::t('app', 'Май'),
                6 => Yii::t('app', 'Июнь'),
                7 => Yii::t('app', 'Июль'),
                8 => Yii::t('app', 'Август'),
                9 => Yii::t('app', 'Сентябрь'),
                10 => Yii::t('app', 'Октябрь'),
                11 => Yii::t('app', 'Ноябрь'),
                12 => Yii::t('app', 'Декабрь'),
            ];
        }

        return null === $quarter ? $months : self::getQuarterMonthNames($quarter);
    }

    /**
     * @param $quarter
     * @return array
     */
    private static function getQuarterMonthNames($quarter)
    {
        $quarterMonth = Quarter::getList()[$quarter];

        return array_filter(
            self::getList(),
            function($k) use ($quarterMonth) {
                return in_array($k, $quarterMonth);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}
