<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\ModelImage;
use yii\test\ActiveFixture;

class ModelVideoFixture extends ActiveFixture
{
    public $modelClass = ModelImage::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}
