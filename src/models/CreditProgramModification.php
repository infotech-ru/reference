<?php

namespace infotech\reference\models;

class CreditProgramModification extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_modification';
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id' => 'modification_id']);
    }
}
