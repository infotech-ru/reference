<?php

namespace infotech\reference\models;

class CreditProgramSeries extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_series';
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id' => 'series_id']);
    }
}
