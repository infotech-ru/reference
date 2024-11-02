<?php

namespace infotech\reference\models;

/**
 * Class Brand
 *
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $name_eng
 * @property string $name_market
 * @property string $logo
 * @property string $importer_db_name
 * @property string $host
 * @property string $token
 * @property integer $ecm_id
 * @property boolean $is_supported
 * @property integer $origin_id
 * @property integer $is_vin_manufacturer
 * @property string $color
 * @property boolean $is_recent
 * @property int $vehicle_type
 * @property-read Model[] $models
 * @property-read BrandLogo $brandLogo
 * @property-read OptionGroup[] $optionGroups
 * @property-read OrderType[] $orderTypes
 * @property-read NewsBrand[] $newsBrands
 * @property-read News[] $news
 */
class Brand extends ActiveRecord
{
    public const OPEL_ID = 1;
    public const CHEVROLET_ID = 2;
    public const CADILLAC_ID = 3;
    public const PEUGEOT_ID = 4;
    public const CITROEN_ID = 5;
    public const FORD_ID = 6;
    public const GAZ_ID = 127;
    public const GEELY_ID = 46;
    public const INFINITI_ID = 57;
    public const MERCEDES_ID = 80;
    public const SMART_ID = 108;
    public const SUBARU_ID = 111;
    public const UAZ_ID = 134;
    public const KIA_ID = 8;
    public const NISSAN_ID = 88;
    public const HAVAL_ID = 152;
    public const TANK_ID = 2628;
    public const FIAT_ID = 45;
    public const FIAT_PROFESSIONAL_ID = 2620;
    public const JEEP_ID = 63;
    public const ALFA_ROMEO = 14;
    public const CHRYSLER = 31;
    public const DODGE = 38;
    public const DONGFENG_ID = 39;
    public const MITSUBISHI_ID = 7;
    public const SWM_ID = 2681;
    public const LADA_ID = 125;
    public const HONDA_MOTO_ID = 1215;
    public const HONDA_ID = 52;
    public const ACURA_ID = 13;
    public const EVOLUTE_ID = 2661;
    public const VOYAH_ID = 2664;
    public const CHANGAN_ID = 140;
    public const GAZ_NEW_ID = 1367;
    public const FAW_ID = 43;
    public const TOYOTA_ID = 11;
    public const VOLKSWAGEN_ID = 9;
    public const HYUNDAI_ID = 56;
    public const AUDI_ID = 19;
    public const PORSCHE_ID = 94;
    public const EXEED_ID = 2082;
    public const SA_ID = 2634;
    public const ABARTH_ID = 1365;
    public const LANCIA_ID = 67;
    public const ORA_ID = 2706;
    public const WEY_ID = 2707;
    public const HND_ID = 2714;
    public const VGV_ID = 2716;
    public const ALTAI_ID = 2721;
    public const OMODA_ID = 2643;
    public const JAECOO_ID = 2692;
    public const KNEWSTAR_ID = 2771;
    public const NOT_DEFINED_ID = 139;

    public const VEHICLE_TYPE_MIXED = 1;
    public const VEHICLE_TYPE_PASSENGER = 2;
    public const VEHICLE_TYPE_CARGO = 3;
    public const VEHICLE_TYPE_MOTO = 4;
    public const VEHICLE_TYPE_HND = 5;

    public static function tableName(): string
    {
        return 'brands';
    }

    public static function getList(): array
    {
        return static::find()->select('name, id')->indexBy('id')->column();
    }

    public static function find()
    {
        return new BrandQuery(static::class);
    }

    public function getModels()
    {
        return $this->hasMany(Model::class, ['brand_id' => 'id']);
    }

    public function getBrandLogo()
    {
        return $this->hasOne(BrandLogo::class, ['brand_id' => 'id']);
    }

    public function getOptionGroups()
    {
        return $this->hasMany(OptionGroup::class, ['brand_id' => 'id']);
    }

    public function getOrderTypes()
    {
        return $this->hasMany(OrderType::class, ['brand_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->via('newsBrands');
    }

    public function getNewsBrands()
    {
        return $this->hasMany(NewsBrand::class, ['brand_id' => 'id']);
    }
}
