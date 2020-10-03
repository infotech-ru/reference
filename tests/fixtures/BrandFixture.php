<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Brand;
use yii\test\ActiveFixture;

class BrandFixture extends ActiveFixture
{
    public $modelClass = Brand::class;
    public $depends = [];
    public $db = 'ref_db';
}
