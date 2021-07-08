<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\GenerationFile;
use yii\test\ActiveFixture;

class GenerationFileFixture extends ActiveFixture
{
    public $modelClass = GenerationFile::class;
    public $depends = [];
    public $db = 'ref_db';
}
