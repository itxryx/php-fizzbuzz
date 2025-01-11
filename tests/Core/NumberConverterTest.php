<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests\Core;

use Itxryx\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    public function testConvertWithEmptyRules()
    {
        $fizzbuzz = new NumberConverter([]);
        $this->assertEquals("", $fizzbuzz->convert(1));
    }
}
