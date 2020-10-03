<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\NewsBrand;
use yii\test\ActiveFixture;

class NewsBrandFixture extends ActiveFixture
{
    public $modelClass = NewsBrand::class;
    public $depends = [BrandFixture::class, NewsFixture::class];
    public $db = 'ref_db';
}
