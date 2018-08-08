<?php

namespace app\fixtures;

use infotech\reference\models\City;
use yii\test\ActiveFixture;

class CityFixture extends ActiveFixture
{
    public $modelClass = City::class;
    public $depends = [CountryFixture::class, RegionFixture::class];
    public $db = 'ref_db';
}