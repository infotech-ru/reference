<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Model;
use yii\test\ActiveFixture;

class ModelFixture extends ActiveFixture
{
    public $modelClass = Model::class;
    public $depends = [BrandFixture::class];
    public $db = 'ref_db';
}
