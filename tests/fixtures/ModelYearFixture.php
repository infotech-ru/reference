<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\ModelYear;
use yii\test\ActiveFixture;

class ModelYearFixture extends ActiveFixture
{
    public $modelClass = ModelYear::class;
    public $depends = [ModelFixture::class];
    public $db = 'ref_db';
}
