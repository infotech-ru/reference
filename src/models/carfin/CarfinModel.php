<?php

namespace infotech\reference\models\carfin;

use infotech\reference\models\Model;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Модель справочника моделей CarFin
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 * @property int $model_id
 *
 * @property CarfinMark $mark
 * @property Model $model
 */
class CarfinModel extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'carfin_model';
    }

    /**
     * @return ActiveQuery
     */
    public function getMark(): \yii\db\ActiveQuery
    {
        return $this->hasOne(CarfinMark::class, ['id' => 'brand_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModel(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}
