<?php

namespace app\fixtures;

use infotech\reference\models\RussianName;
use yii\test\ActiveFixture;

class RussianNameFixture extends ActiveFixture
{
    public $modelClass = RussianName::class;
    public $depends = [];
    public $db = 'ref_db';
}
