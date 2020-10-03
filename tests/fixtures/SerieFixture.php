<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Serie;
use yii\test\ActiveFixture;

class SerieFixture extends ActiveFixture
{
    public $modelClass = Serie::class;
    public $depends = [GenerationFixture::class, ModelFixture::class];
    public $db = 'ref_db';
}
