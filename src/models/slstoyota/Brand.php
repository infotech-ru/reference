<?php

namespace infotech\reference\models\slstoyota;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\slstoyota\queries\BrandQuery;

/**
 * @property integer $id
 * @property string $guid
 * @property integer $brand_id
 * @property string $created_at
 * @property string $updated_at
 */
class Brand extends ActiveRecord
{
    public static function tableName()
    {
        return 'sls_toyota_brand';
    }

    public static function find()
    {
        return new BrandQuery(static::class);
    }
}
