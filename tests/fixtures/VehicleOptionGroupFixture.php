<?php

namespace app\fixtures;

use infotech\reference\models\VehicleOptionGroup;
use yii\test\ActiveFixture;

class VehicleOptionGroupFixture extends ActiveFixture
{
    public $modelClass = VehicleOptionGroup::class;
    public $depends = [];
    public $db = 'ref_db';
}