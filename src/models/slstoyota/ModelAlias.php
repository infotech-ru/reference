<?php

namespace infotech\reference\models\slstoyota;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\slstoyota\queries\ModelAliasQuery;

/**
 * @property integer $id
 * @property string $guid
 * @property integer $brand_id
 * @property integer $model_id
 * @property integer $generation_id
 * @property integer $serie_id
 * @property integer $modification_id
 * @property integer $equipment_id
 * @property string $created_at
 * @property string $updated_at
 */
class ModelAlias extends ActiveRecord
{
    public static function tableName()
    {
        return 'sls_toyota_model_alias';
    }

    public static function find()
    {
        return new ModelAliasQuery(static::class);
    }
}
