<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\MakeQuery;
use infotech\reference\models\Brand;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "avito_make".
 *
 * @property int       $id
 * @property string    $name
 *
 * @property MakeMap[] $makeMaps
 * @property Brand[]   $refBrands
 * @property Model[]   $models
 */
class Make extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'avito_make';
    }

    public function rules(): array
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
        ];
    }

    public function getMakeMaps(): ActiveQuery
    {
        return $this->hasMany(MakeMap::class, ['make_id' => 'id']);
    }

    public function getRefBrands(): ActiveQuery
    {
        return $this->hasMany(Brand::class, ['id' => 'ref_brand_id'])->viaTable('avito_make_map', ['make_id' => 'id']);
    }

    public function getModels(): ActiveQuery
    {
        return $this->hasMany(Model::class, ['make_id' => 'id']);
    }

    public static function find(): MakeQuery
    {
        return new MakeQuery(static::class);
    }
}
