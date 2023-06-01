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
        return new SourceQuery(static::class);
    }

    private static function processItems($list, $parentId, $prefix): array
    {
        $result = [];
        foreach ($list as $item) {
            if ($item->parent_id == $parentId) {
                $result[$item->id] = ltrim($prefix . ' ' . $item->name);
                $result += self::processItems($list, $item->id, $prefix . '-');
            }
        }
        return $result;
    }

    public static function getList(): array
    {
        return self::processItems(static::find()->all(), null, '');
    }

    public function getParent()
    {
        return $this->hasOne(Source::class, ['id' => 'parent_id']);
    }
}
