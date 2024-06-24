<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;

/**
 * This is the model class for table "{{%avito_options_map}}".
 *
 * @property int $id
 * @property int $option_type_id
 * @property string $avito_value
 * @property string $avito_option_code
 * @property string $avito_option_group
 * @property string $avito_option_value
 */
class AvitoOptionMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'avito_options_map';
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
                    'avito_option_code',
                    'avito_option_group',
                    'avito_option_value',
                ],
                'string',
            ],
        ];
    }
}
