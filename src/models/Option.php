<?php

namespace infotech\reference\models;

/**
 * Class Option
 * @package infotech\reference\models
 * @property integer          $id
 * @property integer          $equipment_id
 * @property integer          $model_option_id
 * @property string           $name
 * @property string           $created_at
 * @property string           $updated_at
 * @property integer          $option_group_id
 * @property-read Equipment   $equipment
 * @property-read ModelOption $modelOption
 * @property-read OptionGroup $optionGroup
 */
class Option extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_option';
    }

    public static function find()
    {
        return new OptionQuery(static::class);
    }

    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getModelOption()
    {
        return $this->hasOne(ModelOption::class, ['id' => 'model_option_id']);
    }

    public function getOptionGroup()
    {
        return $this->hasOne(OptionGroup::class, ['id' => 'option_group_id']);
    }
}
