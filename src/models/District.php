<?php

namespace infotech\reference\models;

/**
 * @property int $id
 * @property int $country_id
 * @property int $region_id
 * @property string $name
 * @property ?int $center_city_id
 * @property string $fias_id
 *
 * @property-read Country $country
 * @property-read Region $region
 * @property-read ?City $centerCity
 */
class District extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'districts';
    }

    public static function getList($params = []): array
    {
        $query = static::find()
            ->andWhere($params)
            ->select('name')
            ->indexBy('id');

        return $query->column();
    }

    public function getCenterCity(): \yii\db\ActiveQuery
    {
        return $this->hasOne(City::class, ['id' => 'center_city_id']);
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
