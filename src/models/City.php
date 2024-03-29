<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class City
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 * @property string $english_name
 * @property string $name_where
 * @property string $timezone
 * @property double $lat
 * @property double $lng
 * @property boolean $is_regional_center
 * @property string $fias_id
 *
 * @property-read Country $country
 * @property-read Region $region
 */
class City extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'cities';
    }

    public static function find(): CityQuery
    {
        return new CityQuery(static::class);
    }

    /**
     * @param $regionId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($regionId): array
    {
        $query = static::find()
            ->region($regionId)
            ->select('name, id')
            ->indexBy('id');

        return $query->column();
    }

    public function getCountry(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getRegion(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}
