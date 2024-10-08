<?php

namespace infotech\reference\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * Class Region
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $country_id
 * @property integer $federal_district_id
 * @property string $name
 * @property string $eng_name
 * @property integer $status
 * @property string $timezone
 * @property double $lat
 * @property double $lng
 * @property string $okato
 * @property int $center_city_id
 * @property string $iso_code
 * @property string $kladr_code
 * @property string $fias_id
 *
 * @property-read Country $country
 * @property-read FederalDistrict $federalDistrict
 * @property-read City[] $cities
 * @property-read City $centerCity
 */
class Region extends ActiveRecord
{
    public const STATUS_ACTIVE = 0;
    public const STATUS_DELETED = 1;

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

    public static function find(): RegionQuery
    {
        return new RegionQuery(static::class);
    }

    /**
     * @param $countryId
     * @param $federalDistrictId
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($countryId, $federalDistrictId): array
    {
        $query = static::find()
            ->status(self::STATUS_ACTIVE)
            ->andFilterWhere(['country_id' => $countryId, 'federal_district_id' => $federalDistrictId])
            ->select('name, id')
            ->indexBy('id');

        return $query->column();
    }

    public static function getListRegionsByCountry(): array
    {
        $query = static::find()
            ->select('name, id, country_id')
            ->with('country')
            ->orderBy('name');

        return ArrayHelper::map($query->all(), 'id', 'name', 'country.name');
    }

    public function getCountry(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getFederalDistrict(): \yii\db\ActiveQuery
    {
        return $this->hasOne(FederalDistrict::class, ['id' => 'federal_district_id']);
    }

    public function getCities(): \yii\db\ActiveQuery
    {
        return $this->hasMany(City::class, ['region_id' => 'id']);
    }

    public function getCenterCity(): \yii\db\ActiveQuery
    {
        return $this->hasOne(City::class, ['id' => 'center_city_id']);
    }
}
