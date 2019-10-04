<?php

namespace infotech\reference\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\Connection;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * @return object|Connection|null
     * @throws InvalidConfigException
     */
    public static function getDb()
    {
        return Yii::$app->get('ref_db');
    }
}
