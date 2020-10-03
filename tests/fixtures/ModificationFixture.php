<?php

namespace app\fixtures;

use infotech\reference\models\Modification;
use yii\test\ActiveFixture;

class ModificationFixture extends ActiveFixture
{
    public $modelClass = Modification::class;
    public $depends = [SerieFixture::class];
    public $db = 'ref_db';
}
