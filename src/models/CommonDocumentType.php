<?php

namespace infotech\reference\models;

/**
 * Class CommonDocumentType
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $context
 * @property boolean $is_active
 */
class CommonDocumentType extends ActiveRecord
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;
    public static function tableName(): string
    {
        return 'common_document_types';
    }

    public static function find(): CommonDocumentTypeQuery
    {
        return new CommonDocumentTypeQuery(static::class);
    }

}
