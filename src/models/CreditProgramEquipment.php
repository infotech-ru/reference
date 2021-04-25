<?php

namespace infotech\reference\models;

class CreditProgramEquipment extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_equipment';
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }
}
