<?php

namespace infotech\reference\models;

/**
 * Class EquipmentCatalogEmplacement
 * @package infotech\reference\models
 * @property integer $equipment_id
 * @property integer $catalog_emplacement_id
 * @property-read Equipment $equipment
 * @property-read CatalogEmplacement $catalogEmplacement
 */
class EquipmentCatalogEmplacement extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_equipment_catalog_emplacement';
    }

    public static function find()
    {
        return new EquipmentCatalogEmplacementQuery(static::class);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getCatalogEmplacement()
    {
        return $this->hasOne(CatalogEmplacement::class, ['id' => 'catalog_emplacement_id']);
    }
}