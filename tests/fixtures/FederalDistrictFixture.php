<?php

namespace app\fixtures;

use infotech\reference\models\FederalDistrict;
use yii\test\ActiveFixture;

class FederalDistrictFixture extends ActiveFixture
{
    public $modelClass = FederalDistrict::class;
    public $depends = [CountryFixture::class];
    public $db = 'ref_db';
}
