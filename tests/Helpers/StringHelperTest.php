<?php

namespace Tests\Helpers;

use App\Helpers\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperTest extends TestCase
{
    public function testUcFirst(): void
    {
        $this->assertEquals(
            [
                'Абраменко',
                'Петров',
                'First'
            ],
            [
                StringHelper::ucFirst('абраменко'),
                StringHelper::ucFirst('ПЕТРОВ'),
                StringHelper::ucFirst('fIRST')
            ],
            'Приведение слова к виду, первая буква большая остальные маленькие');
    }
}
