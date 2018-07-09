<?php

namespace infotech\reference\models;

/**
 * Class FederalDistrict
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property Region[] $regions
 */
class FederalDistrict extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'federal_districts';
    }

    public static function find()
    {
        return new FederalDistrictQuery(static::class);
    }

    public function getRegions()
    {
        return $this->hasMany(Region::class, ['federal_district_id' => 'id']);
    }
}