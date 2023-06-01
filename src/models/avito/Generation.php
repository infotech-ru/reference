<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\GenerationQuery;
use infotech\reference\models\Generation as RefGeneration;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "avito_generation".
 *
 * @property int             $id
 * @property string          $name
 * @property int             $model_id
 *
 * @property Model           $model
 * @property GenerationMap[] $generationMaps
 * @property RefGeneration[] $refGenerations
 * @property Modification[]  $modifications
 */
class Generation extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'avito_generation';
    }

    public static function find(): GenerationQuery
    {
        return new GenerationQuery(static::class);
    }

    public function rules(): array
    {
        return [
            [['model_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [
                ['model_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Model::class,
                'targetAttribute' => ['model_id' => 'id']
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'model_id' => Yii::t('app', 'Model ID'),
        ];
    }

    public function getModel(): ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getGenerationMaps(): ActiveQuery
    {
        return $this->hasMany(GenerationMap::class, ['generation_id' => 'id']);
    }

    public function getRefGenerations(): ActiveQuery
    {
        return $this->hasMany(RefGeneration::class, ['id_car_generation' => 'ref_generation_id'])
            ->viaTable('avito_generation_map', ['generation_id' => 'id']);
    }

    public function getModifications(): ActiveQuery
    {
        return $this->hasMany(Modification::class, ['generation_id' => 'id']);
    }
}
