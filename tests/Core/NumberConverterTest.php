<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests\Core;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;
use Itxryx\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
    public function testConvertWithEmptyRules()
    {
        $fizzbuzz = new NumberConverter([]);
        $this->assertEquals("", $fizzbuzz->convert(1));
    }

    public function testConvertWithSingleRule()
    {
        $rule = $this->createMock(ReplaceRuleInterface::class);
        $rule->expects($this->atLeastOnce())
            ->method('replace')
            ->with('1')
            ->willReturn('Replaced');

        $fizzbuzz = new NumberConverter([$rule]);
        $this->assertEquals("Replaced", $fizzbuzz->convert(1));
    }

    public function testConvertWithFizzBuzzRules()
    {
        $fizzbuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                replacement: "Fizz"
            ),
            $this->createMockRule(
                expectedNumber: 1,
                replacement: "Buzz"
            ),
        ]);

        $this->assertEquals("FizzBuzz", $fizzbuzz->convert(1));
    }

    public function testConvertWithUnmatchedFizzBuzzRulesAndConstantRule()
    {
        $fizzbuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                replacement: ""
            ),
            $this->createMockRule(
                expectedNumber: 1,
                replacement: ""
            ),
            $this->createMockRule(
                expectedNumber: 1,
                replacement: "1"
            )
        ]);
        $this->assertEquals("1", $fizzbuzz->convert(1));
    }

    private function createMockRule(
        int $expectedNumber,
        string $replacement
    ): ReplaceRuleInterface
    {
        $rule = $this->createMock(ReplaceRuleInterface::class);
        $rule->expects($this->atLeastOnce())
            ->method('replace')
            ->with($expectedNumber)
            ->willReturn($replacement);
        return $rule;
    }
}
