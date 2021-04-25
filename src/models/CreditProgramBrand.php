<?php

namespace infotech\reference\models;

class CreditProgramBrand extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_brand';
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
