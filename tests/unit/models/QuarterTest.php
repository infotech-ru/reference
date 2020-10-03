<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Quarter;
use PHPUnit\Framework\TestCase;

class QuarterTest extends TestCase
{
    public function testGetList()
    {
        $this->assertEquals(
            [
                1 => [1, 2, 3],
                2 => [4, 5, 6],
                3 => [7, 8, 9],
                4 => [10, 11, 12],
            ],
            Quarter::getList()
        );
    }
}
