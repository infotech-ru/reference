<?php

namespace app\fixtures;

use infotech\reference\models\Body;
use yii\test\ActiveFixture;

class BodyFixture extends ActiveFixture
{
    public $modelClass = Body::class;
    public $depends = [];
    public $db = 'ref_db';
}
