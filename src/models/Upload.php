<?php

namespace infotech\reference\models;

use yii\behaviors\TimestampBehavior;

/**
 * Class Upload
 * @package infotech\reference\models
 * @property integer $id
 * @property string $type
 * @property string $filename
 * @property string $created_at
 * @property string $updated_at
 */
class Upload extends ActiveRecord
{
    public const TYPE_SELECTEL = 'selectel';

    public static function tableName(): string
    {
        return 'dsf_upload';
    }

    public static function find(): UploadQuery
    {
        return new UploadQuery(static::class);
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }
}
