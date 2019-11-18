<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\dromru\queries\CityQuery;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "autocrm.dromru_city".
 *
 * @property int $id
 * @property string $name
 */
class City extends ActiveRecord
{
    public static function tableName(): string 
    {
        return 'autocrm.dromru_city';
    }

    public function rules(): array 
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (DromRu)',
            'name' => 'Название (DromRu)',
        ];
    }

    public static function find(): CityQuery
    {
        return new CityQuery(static::class);
    }
}
