<?php

namespace infotech\reference\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Class City
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $country_id
 * @property integer $federal_district_id
 * @property string $name
 * @property integer $status
 * @property string $timezone
 * @property double $lat
 * @property double $lng
 * @property string $okato
 * @property int $center_city_id
 * @property Country $country
 * @property FederalDistrict $federalDistrict
 * @property City[] $cities
 * @property City $centerCity
 */
class Region extends ActiveRecord
{
    public const  STATUS_ACTIVE = 0;
    public const  STATUS_DELETED = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активно'),
            self::STATUS_DELETED => Yii::t('app', 'Удалено'),
        ];
    }

    public static function tableName(): string
    {
        return 'regions';
    }

    public static function find()
    {
        return new RegionQuery(static::class);
    }

    /**
     * @param $countryId
     * @param $federalDistrictId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($countryId, $federalDistrictId)
    {
        $query = static::find()
            ->status(self::STATUS_ACTIVE)
            ->andFilterWhere(['country_id' => $countryId, 'federal_district_id' => $federalDistrictId])
            ->select('name, id')
            ->indexBy('id');

        return $query->column();
    }

    public static function getListRegionsByCountry()
    {
        $query = static::find()
            ->select('name, id, country_id')
            ->with('country')
            ->orderBy('name');

        return ArrayHelper::map($query->all(), 'id', 'name', 'country.name');
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getFederalDistrict()
    {
        return $this->hasOne(FederalDistrict::class, ['id' => 'federal_district_id']);
    }

    public function getCities()
    {
        return $this->hasMany(City::class, ['region_id' => 'id']);
    }

    public function getCenterCity()
    {
        return $this->hasOne(City::class, ['id' => 'center_city_id']);
    }
}
