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
        $this->assertEquals('Fizz', $fizzbuzz->convert(3));
        $this->assertEquals('4', $fizzbuzz->convert(4));
        $this->assertEquals('Buzz', $fizzbuzz->convert(5));
        $this->assertEquals('Fizz', $fizzbuzz->convert(6));
        $this->assertEquals('Buzz', $fizzbuzz->convert(10));
        $this->assertEquals('FizzBuzz', $fizzbuzz->convert(15));
        $this->assertEquals('FizzBuzz', $fizzbuzz->convert(30));
    }
}
