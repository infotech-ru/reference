<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\MakeMapQuery;
use infotech\reference\models\Brand;
use Yii;

/**
 * This is the model class for table "avito_make_map".
 *
 * @property int $make_id
 * @property int $ref_brand_id
 *
 * @property Make $make
 * @property Brand $refBrand
 */
class MakeMap extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_make_map';
    }

    public static function find()
    {
        return new MakeMapQuery(static::class);
    }

    public function rules()
    {
        return [
            [['make_id', 'ref_brand_id'], 'required'],
            [['make_id', 'ref_brand_id'], 'integer'],
            [['make_id', 'ref_brand_id'], 'unique', 'targetAttribute' => ['make_id', 'ref_brand_id']],
            [
                ['make_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Make::class,
                'targetAttribute' => ['make_id' => 'id']
            ],
            [
                ['ref_brand_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['ref_brand_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'make_id' => Yii::t('app', 'Make ID'),
            'ref_brand_id' => Yii::t('app', 'Ref Brand ID'),
        ];
    }

    public function getMake()
    {
        return $this->hasOne(Make::class, ['id' => 'make_id']);
    }

    public function getRefBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'ref_brand_id']);
    }
}
