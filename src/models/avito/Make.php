<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\avito\queries\MakeQuery;
use infotech\reference\models\Brand;
use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "avito_make".
 *
 * @property int $id
 * @property string $name
 *
 * @property MakeMap[] $makeMaps
 * @property Brand[] $refBrands
 * @property Model[] $models
 */
class Make extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_make';
    }

    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function getMakeMaps()
    {
        return $this->hasMany(MakeMap::class, ['make_id' => 'id']);
    }

    public function getRefBrands()
    {
        return $this->hasMany(Brand::class, ['id' => 'ref_brand_id'])->viaTable('avito_make_map', ['make_id' => 'id']);
    }

    public function getModels()
    {
        return $this->hasMany(Model::class, ['make_id' => 'id']);
    }
    
    public static function find()
    {
        return new MakeQuery(static::class);
    }
}
