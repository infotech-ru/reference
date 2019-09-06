<?php

namespace infotech\reference\src\models\carfin;

use infotech\reference\models\Brand;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Модель справочника марок CarFin
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 */
class CarfinMark extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'carfin_mark';
    }

    /**
     * @return ActiveQuery
     */
    public function getBrand(): ActiveQuery
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
