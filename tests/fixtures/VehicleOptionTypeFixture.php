<?php

namespace app\fixtures;

use infotech\reference\models\VehicleOptionType;
use yii\test\ActiveFixture;

class VehicleOptionTypeFixture extends ActiveFixture
{
    public $modelClass = VehicleOptionType::class;
    public $depends = [VehicleOptionGroupFixture::class];
    public $db = 'ref_db';
}