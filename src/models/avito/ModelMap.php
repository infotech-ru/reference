<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ModelMapQuery;
use infotech\reference\models\Model as RefModel;
use Yii;

/**
 * This is the model class for table "avito_model_map".
 *
 * @property int $model_id
 * @property int $ref_model_id
 *
 * @property Model $model
 * @property RefModel $refModel
 */
class ModelMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_model_map';
    }

    public static function find()
    {
        return new ModelMapQuery(static::class);
    }

    public function rules()
    {
        return [
            [['model_id', 'ref_model_id'], 'required'],
            [['model_id', 'ref_model_id'], 'integer'],
            [['model_id', 'ref_model_id'], 'unique', 'targetAttribute' => ['model_id', 'ref_model_id']],
            [
                ['model_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Model::class,
                'targetAttribute' => ['model_id' => 'id']
            ],
            [
                ['ref_model_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => RefModel::class,
                'targetAttribute' => ['ref_model_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'model_id' => Yii::t('app', 'Model ID'),
            'ref_model_id' => Yii::t('app', 'Ref Model ID'),
        ];
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getRefModel()
    {
        return $this->hasOne(RefModel::class, ['id' => 'ref_model_id']);
    }
}
