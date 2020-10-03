<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Region;
use yii\test\ActiveFixture;

class RegionFixture extends ActiveFixture
{
    public $modelClass = Region::class;
    public $depends = [CountryFixture::class, FederalDistrictFixture::class];
    public $db = 'ref_db';
}
