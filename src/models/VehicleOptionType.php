<?php

namespace infotech\reference\models;

/**
 * Class VehicleOptionGroup
 * @package infotech\reference\models
 *
 * @property integer            $id
 * @property integer            $group_id
 * @property string             $name
 * @property string             $values_json
 * @property array              $values
 *
 * @property VehicleOptionGroup $group
 */
class VehicleOptionType extends ActiveRecord
{
    public $values = [];

    public static function tableName(): string
    {
        return 'vehicle_option_type';
    }

    public function rules()
    {
        return [
            [['group_id', 'name'], 'required'],
            ['group_id', 'exist', 'targetClass' => VehicleOptionGroup::class, 'targetAttribute' => 'id'],
            ['values', 'safe'],
        ];
    }

    public static function find()
    {
        return new VehicleOptionTypeQuery(static::class);
    }

    public function getGroup()
    {
        return $this->hasOne(VehicleOptionGroup::class, ['id' => 'group_id']);
    }

    public function afterFind()
    {
        $this->values = json_decode($this->values_json ?: '[]', true);

        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $this->values_json = json_encode($this->values ?: []);

        return parent::beforeSave($insert);
    }
}
