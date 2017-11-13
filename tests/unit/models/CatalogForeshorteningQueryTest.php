<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\CatalogForeshortening;
use infotech\reference\models\CatalogForeshorteningQuery;
use PHPUnit\Framework\TestCase;

class CatalogForeshorteningQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new CatalogForeshorteningQuery(CatalogForeshortening::class));
    }
}