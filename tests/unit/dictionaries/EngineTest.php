<?php

namespace infotech\reference\tests\unit\dictionaries;

use infotech\reference\dictionaries\Engine;
use PHPUnit\Framework\TestCase;

class EngineTest extends TestCase
{
    public function testGetList()
    {
        $this->assertEquals([1 => 'Бензин', 2 => 'Дизель', 3 => 'Гибрид', 4 => 'Электро'], Engine::getList());
    }
}