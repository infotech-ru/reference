<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Country;
use yii\test\ActiveFixture;

class CountryFixture extends ActiveFixture
{
    public $modelClass = Country::class;
    public $depends = [];
    public $db = 'ref_db';
}
