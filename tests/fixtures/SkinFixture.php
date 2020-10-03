<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Skin;
use yii\test\ActiveFixture;

class SkinFixture extends ActiveFixture
{
    public $modelClass = Skin::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}
