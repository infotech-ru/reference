<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\EquipmentModelImage;
use infotech\reference\models\EquipmentModelImageQuery;
use PHPUnit\Framework\TestCase;

class EquipmentModelImageTest extends TestCase
{
    public function testConstructor()
    {
        self::assertNotNull(new EquipmentModelImage());
    }

    public function testTableName()
    {
        self::assertEquals('eqt_equipment_model_image', EquipmentModelImage::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(EquipmentModelImageQuery::class, EquipmentModelImage::find());
    }

    public function testAttributes()
    {
        $model = new EquipmentModelImage();
        self::assertEquals(
            [
                'model_image_id',
                'equipment_id',
            ],
            $model->attributes()
        );
    }
}
