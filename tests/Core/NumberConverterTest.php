<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests\Core;

use Itxryx\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    public function testConvert()
    {
        $fizzbuzz = new NumberConverter();
        $this->assertEquals('1', $fizzbuzz->convert(1));
        $this->assertEquals('2', $fizzbuzz->convert(2));
    }
}
