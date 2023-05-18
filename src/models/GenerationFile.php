<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class GenerationFile
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $generation_id
 * @property integer $upload_id
 * @property-read  Generation $generation
 * @property-read  Upload $upload
 */
class GenerationFile extends ActiveRecord
{
    public const TYPE_DOCUMENT = 1;
    public const TYPE_BROCHURE = 2;

    public static function tableName(): string
    {
        return 'generation_file';
    }

    public static function getTypeList(): array
    {
        return [
            self::TYPE_DOCUMENT => Yii::t('app', 'Документация'),
            self::TYPE_BROCHURE => Yii::t('app', 'Брошюра'),
        ];
    }


    public static function find(): GenerationFileQuery
    {
        return new GenerationFileQuery(static::class);
    }

    public function getGeneration(): GenerationQuery
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id']);
    }

    public function getUpload(): UploadQuery
    {
        return $this->hasOne(Upload::class, ['id' => 'upload_id']);
    }
}
