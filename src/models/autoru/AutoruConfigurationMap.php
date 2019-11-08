<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruConfigurationMapQuery;

/**
 * This is the model class for table "eqt_autoru_configuration_map".
 *
 * @property int $configuration_id
 * @property int $serie_id
 *
 * @property AutoruConfiguration $configuration
 */
class AutoruConfigurationMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'eqt_autoru_configuration_map';
    }

    public function rules()
    {
        return [
            [['configuration_id', 'serie_id'], 'required'],
            [['configuration_id', 'serie_id'], 'integer'],
            [['configuration_id', 'serie_id'], 'unique', 'targetAttribute' => ['configuration_id', 'serie_id']],
            [['configuration_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruConfiguration::class, 'targetAttribute' => ['configuration_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'configuration_id' => 'Configuration ID',
            'serie_id' => 'Serie ID',
        ];
    }

    public function getConfiguration()
    {
        return $this->hasOne(AutoruConfiguration::class, ['id' => 'configuration_id']);
    }

    public static function find(): AutoruConfigurationMapQuery
    {
        return new AutoruConfigurationMapQuery(static::class);
    }
}
