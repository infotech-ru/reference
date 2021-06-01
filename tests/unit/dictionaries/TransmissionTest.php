<?php

namespace infotech\reference\tests\unit\dictionaries;

use infotech\reference\dictionaries\Transmission;
use PHPUnit\Framework\TestCase;

class TransmissionTest extends TestCase
{
    public function testGetList()
    {
        self::assertEquals([1 => 'МКПП', 2 => 'АКПП', 3 => 'Вариатор', 4 => 'Робот'], Transmission::getList());
    }
}
