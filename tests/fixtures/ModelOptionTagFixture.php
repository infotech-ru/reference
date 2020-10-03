<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\ModelOptionTag;
use yii\test\ActiveFixture;

class ModelOptionTagFixture extends ActiveFixture
{
    public $modelClass = ModelOptionTag::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}
