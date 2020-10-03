<?php

namespace app\fixtures;

use infotech\reference\models\Source;
use yii\test\ActiveFixture;

class SourceFixture extends ActiveFixture
{
    public $modelClass = Source::class;
    public $depends = [];
    public $db = 'ref_db';
}
