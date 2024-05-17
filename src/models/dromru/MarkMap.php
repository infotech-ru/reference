<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\ActiveRecord;

class MarkMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'dromru_mark_map';
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