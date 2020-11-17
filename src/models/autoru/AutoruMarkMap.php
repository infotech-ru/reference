<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruMarkMapQuery;

/**
 * @property int $brand_id
 * @property int $mark_id
 */
class AutoruMarkMap extends ActiveRecord
{
    public static function find(): AutoruMarkMapQuery
    {
        return new AutoruMarkMapQuery(static::class);
    }

    public static function tableName(): string
    {
        return '{{%autoru_mark_map}}';
    }

    public function rules(): array
    {
        return [
            [['mark_id', 'brand_id'], 'required'],
            [['mark_id', 'brand_id'], 'integer'],
            [['mark_id', 'brand_id'], 'unique', 'targetAttribute' => ['mark_id', 'brand_id']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'brand_id' => 'Бренд',
            'mark_id' => 'Бренд',
        ];
    }
}
