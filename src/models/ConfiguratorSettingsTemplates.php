<?php

namespace infotech\reference\models;

/**
 * Class Foreshortening
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property string $data_json
 * @property boolean $is_active
 */
class ConfiguratorSettingsTemplates extends ActiveRecord
{
    public static function tableName()
    {
        return 'configurator_settings_templates';
    }
}
