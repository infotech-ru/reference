<?php

namespace app\fixtures;

use infotech\reference\models\OptionGroup;
use yii\test\ActiveFixture;

class OptionGroupFixture extends ActiveFixture
{
    public $modelClass = OptionGroup::class;
    public $depends = [BrandFixture::class];
    public $db = 'ref_db';
}
