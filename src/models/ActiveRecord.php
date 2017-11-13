<?php

namespace infotech\reference\models;


abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->get('ref_db');
    }
}