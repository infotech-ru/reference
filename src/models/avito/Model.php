<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ModelQuery;
use infotech\reference\models\Model as RefModel;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "avito_model".
 *
 * @property int          $id
 * @property string       $name
 * @property int          $make_id
 *
 * @property Generation[] $generations
 * @property Make         $make
 * @property ModelMap[]   $modelMaps
 * @property RefModel[]   $refModels
 */
class Model extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'avito_model';
    }

    public static function find(): ModelQuery
    {
        return new ModelQuery(static::class);
    }

    public function rules(): array
    {
        return [
            [['make_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [
                ['make_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Make::class,
                'targetAttribute' => ['make_id' => 'id']
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'make_id' => Yii::t('app', 'Make ID'),
        ];
    }

    public function getGenerations(): ActiveQuery
    {
        return $this->hasMany(Generation::class, ['model_id' => 'id']);
    }

    public function getMake(): ActiveQuery
    {
        return $this->hasOne(Make::class, ['id' => 'make_id']);
    }

    public function getModelMaps(): ActiveQuery
    {
        return $this->hasMany(ModelMap::class, ['model_id' => 'id']);
    }

    public function getRefModels(): ActiveQuery
    {
        return $this->hasMany(RefModel::class, ['id' => 'ref_model_id'])
            ->viaTable('avito_model_map', ['model_id' => 'id']);
    }
}
