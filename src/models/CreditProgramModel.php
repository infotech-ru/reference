<?php

namespace infotech\reference\models;

class CreditProgramModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'credit_program_model';
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}
