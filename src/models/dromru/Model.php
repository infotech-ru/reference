<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\dromru\queries\ModelQuery;
use Yii;
use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_model".
 *
 * @property int $id
 * @property string $name
 * @property int $mark_id
 *
 * @property-read Mark $mark
 * @property-read ModelMap[] $modelsMap
 */
class Model extends ActiveRecord
{
    public static function tableName()
    {
        return 'dromru_model';
    }

    public function rules()
    {
        return [
            [['mark_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ИД (DromRu)',
            'name' => 'Марка (DromRu)',
            'mark_id' => 'ID марки (DromRu)',
        ];
    }

    /**
     * @return ModelQuery|ActiveQuery
     */
    public static function find()
    {
        return new ModelQuery(static::class);
    }

    /**
     * @return ActiveQuery
     */
    public function getMark()
    {
        return $this->hasOne(Mark::class, ['id' => 'mark_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModelsMap()
    {
        return $this->hasMany(ModelMap::class, ['dromru_model_id' => 'id']);
    }
}
