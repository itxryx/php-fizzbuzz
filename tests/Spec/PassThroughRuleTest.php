<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Tests\Spec;

use Itxryx\FizzBuzz\Spec\PassThroughRule;
use PHPUnit\Framework\TestCase;

class PassThroughRuleTest extends TestCase
{
    public function testReplace()
    {
        $rule = new PassThroughRule([3,5]);
        $this->assertEquals("1", $rule->replace(1));
    }
}
