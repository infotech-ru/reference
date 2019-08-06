<?php

namespace infotech\reference\models;


use Yii;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('ref_db');
    }
}