<?php

namespace infotech\reference;

/**
 * Class Option
 * @package infotech\reference
 * @property integer $id
 * @property integer $equipment_id
 * @property integer $model_option_id
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
 * @property integer $option_group_id
 */
class Option extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_option';
    }

    public static function find()
    {
        return new OptionQuery(get_called_class());
    }

    public function getEquipment(): EquipmentQuery
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getModelOption(): ModelOptionQuery
    {
        return $this->hasOne(ModelOption::class, ['id' => 'model_option_id']);
    }

    public function getOptionGroup(): OptionGroupQuery
    {
        return $this->hasOne(OptionGroup::class, ['id' => 'option_group_id']);
    }
}