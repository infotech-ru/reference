<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class Equipment
 * @package infotech\reference\models
 * @property integer                            $id
 * @property integer                            $model_id
 * @property integer                            $series_id
 * @property string                             $name
 * @property string                             $archive_name
 * @property string                             $tech_name
 * @property integer                            $order
 * @property integer                            $status
 * @property string                             $created_at
 * @property string                             $updated_at
 * @property integer                            $origin_id
 * @property integer                            $country_id
 * @property-read Model                         $model
 * @property-read Serie                         $serie
 * @property-read Option[]                      $options
 * @property-read ModelYearEquipment[]          $modelYearEquipments
 * @property-read ModelYear[]                   $modelYears
 * @property-read ModificationEquipment[]       $modificationEquipments
 * @property-read Modification[]                $modifications
 * @property-read EquipmentCountry[]            $equipmentCountries
 * @property-read Country[]                     $countries
 * @property-read EquipmentCatalogEmplacement[] $equipmentCatalogEmplacements
 * @property-read CatalogEmplacement[]          $catalogEmplacements
 * @property-read CharacteristicValue[]         $characteristicValues
 */
class Equipment extends ActiveRecord
{
    const STATUS_ACTIVE = 1;

    const STATUS_ARCHIVE = 3;

    public static function tableName(): string
    {
        return 'eqt_equipment';
    }

    public static function find()
    {
        return new EquipmentQuery(static::class);
    }

    /**
     * @param $serieId
     * @param $recentOnly
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($serieId, $recentOnly)
    {
        $query = static::find()
            ->serie($serieId)
            ->select('name, id')
            ->indexBy('id');
        if ($recentOnly) {
            $query->status(Equipment::STATUS_ACTIVE);
        }

        return $query->column();
    }


    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSerie()
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'series_id']);
    }

    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getOptions()
    {
        return $this->hasMany(Option::class, ['equipment_id' => 'id']);
    }

    public function getModelYearEquipments()
    {
        return $this->hasMany(ModelYearEquipment::class, ['equipment_id' => 'id']);
    }

    public function getModelYears()
    {
        return $this->hasMany(ModelYear::class, ['id' => 'model_year_id'])->via('modelYearEquipments');
    }

    public function getModificationEquipments()
    {
        return $this->hasMany(ModificationEquipment::class, ['equipment_id' => 'id']);
    }

    public function getModifications()
    {
        return $this->hasMany(Modification::class, ['id_car_modification' => 'modification_id'])->via('modificationEquipments');
    }

    public function getEquipmentCountries()
    {
        return $this->hasMany(EquipmentCountry::class, ['equipment_id' => 'id']);
    }

    public function getCountries()
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])->via('equipmentCountries');
    }

    public function getEquipmentCatalogEmplacements()
    {
        return $this->hasMany(EquipmentCatalogEmplacement::class, ['equipment_id' => 'id']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['id' => 'catalog_emplacement_id'])->via('equipmentCatalogEmplacements');
    }

    public function getCharacteristicValues()
    {
        return $this->hasMany(CharacteristicValue::class, ['id_car_equipment' => 'id_car_equipment']);
    }
}
