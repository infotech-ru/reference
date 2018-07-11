<?php

namespace app\fixtures;

use infotech\reference\models\Currency;
use yii\test\ActiveFixture;

class CurrencyFixture extends ActiveFixture
{
    public $modelClass = Currency::class;
    public $depends = [];
    public $db = 'ref_db';
}