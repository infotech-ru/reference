<?php

namespace app\fixtures;

use infotech\reference\models\News;
use yii\test\ActiveFixture;

class NewsFixture extends ActiveFixture
{
    public $modelClass = News::class;
    public $depends = [];
    public $db = 'ref_db';
}