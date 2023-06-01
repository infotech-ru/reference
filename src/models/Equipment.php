<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class Equipment
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $series_id
 * @property string $name
 * @property string $archive_name
 * @property string $tech_name
 * @property integer $order
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $origin_id
 * @property integer $country_id
 * @property-read Model $model
 * @property-read Serie $serie
 * @property-read Option[] $options
 * @property-read ModelYearEquipment[] $modelYearEquipments
 * @property-read ModelYear[] $modelYears
 * @property-read ModificationEquipment[] $modificationEquipments
 * @property-read Modification[] $modifications
 * @property-read EquipmentCountry[] $equipmentCountries
 * @property-read Country[] $countries
 * @property-read EquipmentCatalogEmplacement[] $equipmentCatalogEmplacements
 * @property-read CatalogEmplacement[] $catalogEmplacements
 * @property-read CharacteristicValue[] $characteristicValues
 */
class Equipment extends ActiveRecord
{
    public const  STATUS_ACTIVE = 1;
    public const  STATUS_ARCHIVE = 3;

    public static function tableName(): string
    {
        return 'eqt_equipment';
    }

    /**
     * @param $serieId
     * @param $recentOnly
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList($serieId, $recentOnly): array
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

    public static function find(): EquipmentQuery
    {
        return new EquipmentQuery(static::class);
    }

    public function getModel(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getSerie(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'series_id']);
    }

    public function getCountry(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    public function getOptions(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Option::class, ['equipment_id' => 'id']);
    }

    public function getModelYearEquipments(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelYearEquipment::class, ['equipment_id' => 'id']);
    }

    public function getModelYears(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModelYear::class, ['id' => 'model_year_id'])->via('modelYearEquipments');
    }

    public function getModificationEquipments(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ModificationEquipment::class, ['equipment_id' => 'id']);
    }

    public function getModifications(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Modification::class, ['id_car_modification' => 'modification_id'])
            ->via('modificationEquipments');
    }

    public function getEquipmentCountries(): \yii\db\ActiveQuery
    {
        return $this->hasMany(EquipmentCountry::class, ['equipment_id' => 'id']);
    }

    public function getCountries(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])->via('equipmentCountries');
    }

    public function getEquipmentCatalogEmplacements(): \yii\db\ActiveQuery
    {
        return $this->hasMany(EquipmentCatalogEmplacement::class, ['equipment_id' => 'id']);
    }

    public function getCatalogEmplacements(): \yii\db\ActiveQuery
    {
        return $this->hasMany(CatalogEmplacement::class, ['id' => 'catalog_emplacement_id'])
            ->via('equipmentCatalogEmplacements');
    }

    public function getCharacteristicValues(): \yii\db\ActiveQuery
    {
        return $this->hasMany(CharacteristicValue::class, ['id_car_equipment' => 'id_car_equipment']);
    }
}
