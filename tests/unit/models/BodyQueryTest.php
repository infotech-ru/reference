<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Body;
use infotech\reference\models\BodyQuery;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveRecord;

class BodyQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveRecord::class, new BodyQuery(Body::class));
    }
}
