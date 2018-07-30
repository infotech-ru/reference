<?php

namespace app\fixtures;

use infotech\reference\models\Body;
use infotech\reference\models\ModelImage;
use yii\test\ActiveFixture;

class ModelVideoFixture extends ActiveFixture
{
    public $modelClass = ModelImage::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}