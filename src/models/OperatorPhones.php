<?php

namespace infotech\reference\models;

/**
 * Class OperatorPhones
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $region_id
 */
class OperatorPhones extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'operator_phones';
    }

    public static function find()
    {
        return new OperatorPhonesQuery(static::class);
    }

    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }
}
