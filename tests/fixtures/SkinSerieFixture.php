<?php

namespace app\fixtures;

use infotech\reference\models\SkinSerie;
use yii\test\ActiveFixture;

class SkinSerieFixture extends ActiveFixture
{
    public $modelClass = SkinSerie::class;
    public $depends = [];
    public $db = 'ref_db';
}