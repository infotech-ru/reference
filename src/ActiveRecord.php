<?php

namespace infotech\reference;


abstract class ActiveRecord extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->get('ref_db');
    }
}