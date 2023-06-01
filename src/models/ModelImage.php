<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class ModelImage
 * @package infotech\reference\models
 * @property integer                    $id
 * @property integer                    $model_id
 * @property integer                    $generation_id
 * @property integer                    $series_id
 * @property integer                    $equipment_id
 * @property integer                    $skin_id
 * @property string                     $url
 * @property integer                    $category
 * @property integer                    $priority
 * @property integer                    $status
 * @property integer                    $placement_type
 * @property-read Model                 $model
 * @property-read Serie                 $series
 * @property-read Generation            $generation
 * @property-read Equipment             $equipment
 * @property-read Skin                  $skin
 * @property-read Equipment[]           $equipments
 * @property-read EquipmentModelImage[] $equipmentModelImages
 */
class ModelImage extends ActiveRecord
{
    public const  STATUS_ACTIVE = 0;
    public const  STATUS_DELETED = 1;
    public const  CATEGORY_EXTERNAL = 0;
    public const  CATEGORY_INTERNAL = 1;

    public const PLACEMENT_MEDIA = 0;
    public const PLACEMENT_SLIDER = 1;

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE  => Yii::t('app', 'Активно'),
            self::STATUS_DELETED => Yii::t('app', 'Удалено'),
        ];
    }

    public static function getPlacementList(): array
    {
        return [
            self::PLACEMENT_MEDIA  => Yii::t('app', 'Медиа'),
            self::PLACEMENT_SLIDER => Yii::t('app', 'Слайдер'),
        ];
    }

    public static function getCategoryList(): array
    {
        return [
            self::CATEGORY_EXTERNAL => Yii::t('app', 'Экстернал'),
            self::CATEGORY_INTERNAL => Yii::t('app', 'Интернал'),
        ];
    }

    public static function tableName(): string
    {
        return 'model_image';
    }

    public static function find(): ModelImageQuery
    {
        return new ModelImageQuery(static::class);
    }

    public function getModel(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getGeneration(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id']);
    }

    public function getSeries(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Serie::class, ['id_car_serie' => 'series_id']);
    }

    /**
     * @deprecated
     */
    public function getEquipment(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function getSkin(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Skin::class, ['id' => 'skin_id']);
    }

    public function getEquipmentModelImages(): \yii\db\ActiveQuery
    {
        return $this->hasMany(EquipmentModelImage::class, ['model_image_id' => 'id']);
    }

    public function getEquipments(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Equipment::class, ['id' => 'equipment_id'])->via('equipmentModelImages');
    }
}
