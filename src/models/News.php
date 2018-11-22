<?php

namespace infotech\reference\models;

class News extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'news';
    }

    public static function find()
    {
        return new NewsQuery(static::class);
    }
}