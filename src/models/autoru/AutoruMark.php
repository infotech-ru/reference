<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\autoru\queries\AutoruMapMarksQuery;

/**
 * This is the model class for table "{{%autoru_mapping}}".
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 */
class AutoruMark extends ActiveRecord
{
    public static function find(): AutoruMapMarksQuery
    {
        return new AutoruMapMarksQuery(static::class);
    }

    public static function tableName(): string
    {
        return 'eqt_autoru_mark';
    }

    public function rules(): array
    {
        return [
            [['id', 'brand_id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (AutoRu)',
            'name' => 'Марка (AutoRu)',
            'code' => 'Код марки',
            'brand_id' => 'Бренд',
        ];
    }
}
