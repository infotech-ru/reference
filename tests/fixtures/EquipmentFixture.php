<?php

namespace app\fixtures;

use infotech\reference\models\Equipment;
use yii\test\ActiveFixture;

class EquipmentFixture extends ActiveFixture
{
    public $modelClass = Equipment::class;
    public $depends = [ModelFixture::class, CountryFixture::class, SerieFixture::class];
    public $db = 'ref_db';
}