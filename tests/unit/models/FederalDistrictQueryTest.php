<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\FederalDistrict;
use infotech\reference\models\FederalDistrictQuery;
use PHPUnit\Framework\TestCase;

class FederalDistrictQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new FederalDistrictQuery(FederalDistrict::class));
    }
}
