<?php

namespace infotech\reference\tests\unit\dictionaries;

use infotech\reference\dictionaries\Drive;
use PHPUnit\Framework\TestCase;

class DriveTest extends TestCase
{
    public function testGetList()
    {
        $this->assertEquals([1 => 'Передний', 2 => 'Задний', 3 => 'Полный',], Drive::getList());
    }
}