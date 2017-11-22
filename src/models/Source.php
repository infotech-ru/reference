<?php

namespace infotech\reference\models;

/**
 * Class Source
 * @package infotech\reference\models
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property-read Source $parent
 */
class Source extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'sources';
    }

    public static function find()
    {
        return new SourceQuery(get_called_class());
    }

    public function getParent()
    {
        return $this->hasOne(Source::class, ['id' => 'parent_id']);
    }
}