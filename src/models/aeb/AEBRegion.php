<?php
/**
 * Created by PhpStorm.
 * User: yakov
 * Date: 08.11.2018
 * Time: 15:44
 */

namespace infotech\reference\models\aeb;

use infotech\reference\models\Brand;
use infotech\reference\models\City;
use infotech\reference\models\Model;
use infotech\reference\models\Region;
use infotech\reference\models\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Class AEBRegion
 * @package app\modules\aeb\models
 *
 * @property int $id
 * @property int $year
 * @property int $month
 * @property int $brand_id
 * @property int $model_id
 * @property int $federal_district_id
 * @property int $region_id
 * @property int $city_id
 * @property int $value
 * @property string $segment
 * @property string $created_at
 */
class AEBRegion extends ActiveRecord
{
    public static function tableName()
    {
        return 'aeb_region';
    }

    public function rules()
    {
        return [
            [['year', 'model_id', 'brand_id', 'city_id', 'region_id', 'federal_district_id', 'month'], 'required'],
            ['brand_id', 'exist', 'targetClass' => Brand::class, 'targetAttribute' => 'id'],
            ['model_id', 'exist', 'targetClass' => Model::class, 'targetAttribute' => 'id'],
            ['city_id', 'exist', 'targetClass' => City::class, 'targetAttribute' => 'id'],
            ['region_id', 'exist', 'targetClass' => Region::class, 'targetAttribute' => 'id'],
            ['segment', 'string', 'max' => 255],
            ['month', 'in', 'range' => array_keys(Month::getList())],
        ];
    }

    public function behaviors()
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
}