<?php

namespace infotech\reference\models;

use infotech\reference\models\Model as ReferenceModel;

/**
 * Class Serie
 * @package infotech\reference\models
 * @property integer $id_car_serie
 * @property integer $model_id
 * @property string $name
 * @property boolean $is_visible
 * @property integer $id_car_generation
 * @property integer $id_car_type
 * @property integer $body_id
 * @property boolean $is_recent
 * @property integer $origin_id
 * @property-read Generation $generation
 * @property-read Body $body
 * @property-read Modification[] $modifications
 * @property-read Equipment[] $equipments
 * @property-read CatalogEmplacement[] $catalogEmplacements
 * @property-read SkinSerie[] $skinSeries
 * @property-read Skin[] $skins
 */
class Serie extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'car_serie';
    }

    public static function primaryKey(): array
    {
        return ['id_car_serie'];
    }

    public static function find(): SerieQuery
    {
        return new SerieQuery(static::class);
    }

    public static function getList($generationId, $recentOnly)
    {
        $query = static::find()
            ->isVisible(true)
            ->generation($generationId)
            ->select('name, id_car_serie')
            ->indexBy('id_car_serie');
        if ($recentOnly) {
            $query->isRecent(true);
        }

        return $query->column();
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'id_car_generation']);
    }

    public function getBody()
    {
        return $this->hasOne(Body::class, ['id' => 'body_id']);
    }

    public function getModifications()
    {
        return $this->hasMany(Modification::class, ['id_car_serie' => 'id_car_serie']);
    }

    public function getEquipments(): EquipmentQuery
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        /** @phpstan-ignore-next-line */
        return $this->hasMany(Equipment::class, ['series_id' => 'id_car_serie']);
    }

    public function getCatalogEmplacements()
    {
        return $this->hasMany(CatalogEmplacement::class, ['serie_id' => 'id_car_serie']);
    }

    public function getSkinSeries()
    {
        return $this->hasMany(SkinSerie::class, ['serie_id' => 'id_car_serie']);
    }

    public function getSkins()
    {
        return $this->hasMany(Skin::class, ['id' => 'skin_id'])->via('skinSeries');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferenceModel()
    {
        return $this->hasOne(ReferenceModel::class, ['id' => 'model_id']);
    }
}
