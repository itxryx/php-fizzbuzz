<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests\Core;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;
use Itxryx\FizzBuzz\Core\NumberConverter;
use PHPUnit\Framework\TestCase;

class NumberConverterTest extends TestCase
{
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
