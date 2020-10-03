<?php

namespace app\fixtures;

use infotech\reference\models\Color;
use yii\test\ActiveFixture;

class ColorFixture extends ActiveFixture
{
    public $modelClass = Color::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}
