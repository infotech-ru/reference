<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\Brand;
use infotech\reference\models\dromru\queries\MarkQuery;
use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "autocrm.dromru_mark".
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 * 
 * @property Brand $refBrand
 */
class Mark extends ActiveRecord
{
    public static function tableName(): string 
    {
        return 'autocrm.dromru_mark';
    }

    public function rules(): array 
    {
        return [
            [['brand_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array 
    {
        return [
            'id' => 'ИД (DromRu)',
            'name' => 'Марка (DromRu)',
            'brand_id' => 'Бренд',
        ];
    }

    public static function find(): MarkQuery
    {
        return new MarkQuery(static::class);
    }
    
    public function getRefBrands()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
