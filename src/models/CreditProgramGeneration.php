<?php

namespace infotech\reference\models;

class CreditProgramGeneration extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_generation';
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id' => 'generation_id']);
    }
}
