<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use yii\helpers\ArrayHelper;
use infotech\reference\models\autoru\queries\AutoruMapModificationQuery;

/**
 * This is the model class for table "{{%autoru_map_modification}}".
 *
 * @property int $id
 * @property int $folder_id
 * @property string $name
 * @property string $configuration_id
 * @property string $tech_param_id
 * @property string $body_type
 * @property string $years
 *
 * @property AutoruModificationMap[] $map
 * @property AutoruConfiguration $configuration
 */
class AutoruModification extends ActiveRecord
{

    public static function getBodysList()
    {
        return [
            1 => 'Кабриолет',
            2 => 'Компактвэн',
            3 => 'Купе',
            4 => 'Купе-хардтоп',
            5 => 'Фастбек',
            6 => 'Фургон',
            7 => 'Хэтчбек',
            8 => 'Ландо',
            9 => 'Лифтбек',
            10 => 'Лимузин',
            11 => 'Микровэн',
            12 => 'Минивэн',
            13 => 'Внедорожник',
            14 => 'Фаэтон-универсал',
            15 => 'Пикап',
            16 => 'Родстер',
            17 => 'Седан',
            18 => 'Тарга',
            19 => 'Седан-хардтоп',
            20 => 'Спидстер',
            21 => 'Внедорожник открытый',
            22 => 'Универсал',
            23 => 'Фаэтон',
        ];
    }

    public static function tableName(): string
    {
        return 'eqt_autoru_modification';
    }

    public function rules(): array
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (AutoRu)',
            'folder_id' => 'Folder ID',
            'name' => 'Название (AutoRu)',
            'configuration_id' => 'Configuration ID',
            'tech_param_id' => 'Tech Param ID',
            'body_type' => 'Кузов (AutoRu)',
            'years' => 'Года (AutoRu)',
            'body_id' => 'Кузов'
        ];
    }

    public function getMap()
    {
        return $this->hasMany(AutoruModificationMap::class, ['modification_id' => 'id']);
    }

    public function getConfiguration()
    {
        return $this->hasOne(AutoruConfiguration::class, ['id' => 'configuration_id']);
    }

    public static function find(): AutoruMapModificationQuery
    {
        return new AutoruMapModificationQuery(static::class);
    }
}
