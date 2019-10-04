<?php

namespace infotech\reference\models;

/**
 * Class Quarter
 * @package infotech\reference\models
 */
class Quarter
{
    /**
     * @return array
     */
    public static function getList()
    {
        return [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];
    }
}
