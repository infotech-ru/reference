<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "autoru_cm_expert_configuration_map".
 *
 * @property int $cm_expert_brand_id
 * @property int $cm_expert_model_id
 * @property int $cm_expert_generation_id
 * @property int $cm_expert_body
 * @property int $cm_expert_doors
 * @property int $cm_expert_engine
 * @property string $cm_expert_volume
 * @property int $cm_expert_power
 * @property int $cm_expert_drive
 * @property int $cm_expert_gear
 *
 * @property string $autoru_brand_name
 * @property string $autoru_model_name
 * @property integer $autoru_generation_id
 * @property integer $autoru_configuration_id
 * @property integer $autoru_tech_param_id
 *
 * @property AutoruConfiguration $configuration
 */
class AutoruCmExpertConfigurationMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'autoru_cm_expert_configuration_map';
    }
}
