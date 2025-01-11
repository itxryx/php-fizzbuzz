<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests;

use Itxryx\FizzBuzz\Core\NumberConverter;
use Itxryx\FizzBuzz\Spec\CyclicNumberRule;
use Itxryx\FizzBuzz\Spec\PassThroughRule;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testFizzBuzz()
    {
        $fizzbuzz = new NumberConverter([
            new CyclicNumberRule(3, "Fizz"),
            new CyclicNumberRule(5, "Buzz"),
            new PassThroughRule()
        ]);
        $this->assertEquals("1", $fizzbuzz->convert(1));
        $this->assertEquals("2", $fizzbuzz->convert(2));
        $this->assertEquals("Fizz", $fizzbuzz->convert(3));
        $this->assertEquals("4", $fizzbuzz->convert(4));
        $this->assertEquals("Buzz", $fizzbuzz->convert(5));
        $this->assertEquals("FizzBuzz", $fizzbuzz->convert(15));
        $this->assertEquals("FizzBuzz", $fizzbuzz->convert(30));
    }
}
