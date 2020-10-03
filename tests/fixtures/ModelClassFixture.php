<?php

namespace app\fixtures;

use infotech\reference\models\ModelClass;
use yii\test\ActiveFixture;

class ModelClassFixture extends ActiveFixture
{
    public $modelClass = ModelClass::class;
    public $depends = [];
    public $db = 'ref_db';
}
