<?php
/**
 * Created by PhpStorm.
 * User: yakov
 * Date: 08.11.2018
 * Time: 2:52
 */

namespace infotech\reference\models\aeb;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\Brand;
use infotech\reference\models\City;
use infotech\reference\models\Model;
use infotech\reference\models\Region;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * Class TemporaryAEBRegionData
 * @package app\modules\aeb\models
 *
 * @property int $id
 * @property int $model_id
 * @property int $brand_id
 * @property int $region_id
 * @property int $city_id
 * @property int $year
 * @property int $month
 * @property int $value
 * @property string $model
 * @property string $city
 * @property string $region
 * @property string $segment
 * @property string $federal_district
 * @property string $created_at
 */
class TemporaryAEBRegionData extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'aeb_temporary_aeb_region_data';
    }

    public function rules(): array
    {
        return [
            [
                [
                    'brand',
                    'model',
                    'segment',
                    'city',
                    'region',
                    'federal_district',
                    'value',
                    'year',
                    'month',
                ],
                'required'
            ],
            [
                [
                    'brand',
                    'model',
                    'city',
                    'region',
                    'segment',
                    'federal_district',
                ],
                'string',
                'max' => 255
            ],
            ['brand_id', 'exist', 'targetClass' => Brand::class, 'targetAttribute' => 'id'],
            ['month', 'in', 'range' => array_keys(Month::getList())],
            [['model', 'city', 'region', 'federal_district', 'segment',], 'trim'],
            [['city_id', 'region_id', 'model_id', 'year'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'created_at' => Yii::t('app', 'Дата и время загрузки'),
            'year' => Yii::t('app', 'Год'),
            'month' => Yii::t('app', 'Месяц'),
            'value' => Yii::t('app', 'Количество'),
            'model' => Yii::t('app', 'Модель'),
            'region' => Yii::t('app', 'Регион'),
            'city' => Yii::t('app', 'Город'),
            'federal_district' => Yii::t('app', 'Федеральный окргу'),
            'brand_id' => Yii::t('app', 'ID Бренда'),
            'segment' => Yii::t('app', 'Сегмент'),
        ];
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}