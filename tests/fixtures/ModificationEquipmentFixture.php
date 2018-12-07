<?php

namespace app\fixtures;

use infotech\reference\models\ModificationEquipment;
use yii\test\ActiveFixture;

class ModificationEquipmentFixture extends ActiveFixture
{
    public $modelClass = ModificationEquipment::class;
    public $depends = [];
    public $db = 'ref_db';
}