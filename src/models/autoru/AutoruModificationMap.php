<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\autoru\queries\AutoruModificationMapQuery;

/**
 * This is the model class for table "{{%autoru_modification_map}}".
 *
 * @property int $modification_id Ид модификации AutoRu
 * @property int $map_id Ид модификации локальный
 *
 * @property AutoruModification $modification
 */
class AutoruModificationMap extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%autoru_modification_map}}';
    }

    public function rules(): array
    {
        return [
            [['modification_id', 'map_id'], 'required'],
            [['modification_id', 'map_id'], 'integer'],
            [['modification_id', 'map_id'], 'unique', 'targetAttribute' => ['modification_id', 'map_id']],
            [['modification_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruModification::class, 'targetAttribute' => ['modification_id' => 'id']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'modification_id' => 'Modification ID',
            'map_id' => 'Map ID',
        ];
    }

    public function getModification()
    {
        return $this->hasOne(AutoruModification::class, ['id' => 'modification_id']);
    }

    public static function find(): AutoruModificationMapQuery
    {
        return new AutoruModificationMapQuery(static::class);
    }
}
