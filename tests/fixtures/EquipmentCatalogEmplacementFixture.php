<?php

namespace app\fixtures;

use infotech\reference\models\EquipmentCatalogEmplacement;
use yii\test\ActiveFixture;

class EquipmentCatalogEmplacementFixture extends ActiveFixture
{
    public $modelClass = EquipmentCatalogEmplacement::class;
    public $depends = [];
    public $db = 'ref_db';
}
