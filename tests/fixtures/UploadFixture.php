<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\Upload;
use yii\test\ActiveFixture;

class UploadFixture extends ActiveFixture
{
    public $modelClass = Upload::class;
    public $depends = [];
    public $db = 'ref_db';
}
