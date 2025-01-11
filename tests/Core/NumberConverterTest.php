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
        $fizzbuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "",
                matchResult: true,
                replacement: "Replaced"
            )
        ]);
        $this->assertEquals("Replaced", $fizzbuzz->convert(1));
    }

    public function testConvertCompositingRuleResults()
    {
        $fizzbuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "",
                matchResult: true,
                replacement: "Fizz"
            ),
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "Fizz",
                matchResult: true,
                replacement: "FizzBuzz"
            )
        ]);
        $this->assertEquals("FizzBuzz", $fizzbuzz->convert(1));
    }

    public function testConvertSkippingUnmatchedRules()
    {
        $fizzbuzz = new NumberConverter([
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "",
                matchResult: false,
                replacement: "Fizz"
            ),
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "",
                matchResult: false,
                replacement: "Buzz"
            ),
            $this->createMockRule(
                expectedNumber: 1,
                expectedCarry: "",
                matchResult: true,
                replacement: "1"
            )
        ]);
        $this->assertEquals("1", $fizzbuzz->convert(1));
    }

    private function createMockRule(
        int $expectedNumber,
        string $expectedCarry,
        bool $matchResult,
        string $replacement
    ): ReplaceRuleInterface
    {
        $rule = $this->createMock(ReplaceRuleInterface::class);
        $rule->expects($this->any())
            ->method('apply')
            ->with($expectedCarry, $expectedNumber)
            ->willReturn($replacement);
        $rule->expects($this->atLeastOnce())
            ->method('match')
            ->with($expectedCarry, $expectedNumber)
            ->willReturn($matchResult);
        return $rule;
    }
}
