<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;

/**
 * This is the model class for table "{{%autoru_business_options_map}}".
 *
 * @property int $id
 * @property int $option_type_id
 * @property string $option_value
 * @property string $autoru_option_code
 * @property string $autoru_option_group
 * @property string $autoru_option_value
 */
class AutoruBusinesOptionMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'autoru_business_options_map';
    }

    public function rules(): array
    {
        return [
            [
                [
                    'option_type_id',
                ],
                'integer',
            ],
            [
                [
                    'option_value',
                    'autoru_option_code',
                    'autoru_option_group',
                    'autoru_option_value',
                ],
                'string',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'option_type_id' => 'Опция',
            'option_value' => 'Значение опции',
            'autoru_option_code' => 'ID (код) опции Autoru',
            'autoru_option_group' => 'Название группы опций в Autoru',
            'autoru_option_value' => 'Значение опции в Autoru',
        ];
    }
}
