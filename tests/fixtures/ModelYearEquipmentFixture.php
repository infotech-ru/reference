<?php

namespace infotech\reference\tests\fixtures;

use infotech\reference\models\ModelYearEquipment;
use yii\test\ActiveFixture;

class ModelYearEquipmentFixture extends ActiveFixture
{
    public $modelClass = ModelYearEquipment::class;
    public $depends = [];
    public $db = 'ref_db';
}
