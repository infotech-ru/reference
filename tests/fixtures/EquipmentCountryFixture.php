<?php

namespace app\fixtures;

use infotech\reference\models\EquipmentCountry;
use yii\test\ActiveFixture;

class EquipmentCountryFixture extends ActiveFixture
{
    public $modelClass = EquipmentCountry::class;
    public $depends = [];
    public $db = 'ref_db';
}