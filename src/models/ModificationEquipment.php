<?php

namespace infotech\reference\models;

/**
 * Class ModificationEquipment
 * @package infotech\reference\models
 * @property integer $modification_id
 * @property string $equipment_id
 * @property-read Modification $modification
 * @property-read Equipment $equipment
 */
class ModificationEquipment extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'modification_equipment';
    }

    public static function find()
    {
        return new ModificationEquipmentQuery(static::class);
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id_car_modification' => 'modification_id']);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }
}
