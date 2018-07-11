<?php

namespace app\fixtures;

use infotech\reference\models\Generation;
use yii\test\ActiveFixture;

class GenerationFixture extends ActiveFixture
{
    public $modelClass = Generation::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}