<?php

namespace app\fixtures;

use infotech\reference\models\ModelSegment;
use yii\test\ActiveFixture;

class ModelSegmentFixture extends ActiveFixture
{
    public $modelClass = ModelSegment::class;
    public $depends = [];
    public $db = 'ref_db';
}