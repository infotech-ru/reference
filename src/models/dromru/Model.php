<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\dromru\queries\ModelQuery;
use infotech\reference\models\Model as RefModel;
use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "dromru_model".
 *
 * @property int $id
 * @property string $name
 * @property int $mark_id
 * @property int $model_id
 *
 * @property-read Mark $mark
 * @property-read RefModel $refModel
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
            [['mark_id', 'model_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ИД (DromRu)',
            'name' => 'Марка (DromRu)',
            'mark_id' => 'ID марки (DromRu)',
            'model_id' => 'Бренд (реф)',
        ];
    }

    public static function find()
    {
        return new ModelQuery(static::class);
    }
    
    public function getMark()
    {
        return $this->hasOne(Mark::class, ['id' => 'mark_id']);
    }
    
    public function getRefModel()
    {
        return $this->hasOne(RefModel::class, ['id' => 'model_id']);
    }
}
