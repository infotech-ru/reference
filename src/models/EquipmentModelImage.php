<?php

namespace infotech\reference\models;

/**
 * @property int             $model_image_id
 * @property int             $equipment_id
 * @property-read Equipment  $equipment
 * @property-read ModelImage $modelImage
 */
class EquipmentModelImage extends ActiveRecord
{
    public static function find(): EquipmentModelImageQuery
    {
        return new EquipmentModelImageQuery(static::class);
    }

    public static function tableName(): string
    {
        return 'eqt_equipment_model_image';
    }

    public function getEquipment(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getModelImage(): \yii\db\ActiveQuery
    {
        return $this->hasOne(ModelImage::class, ['id' => 'model_image_id']);
    }
}
