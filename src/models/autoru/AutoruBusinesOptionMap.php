<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\VehicleOptionType;
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
 * @property string $autoru_option_name
 */
class AutoruBusinesOptionMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'autoru_business_options_map';
    }

    public function getOptionType(): \yii\db\ActiveQuery
    {
        return $this->hasOne(VehicleOptionType::class, ['id' => 'option_type_id']);
    }
}
