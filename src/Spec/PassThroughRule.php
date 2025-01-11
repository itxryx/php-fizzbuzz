<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Spec;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;

class PassThroughRule implements ReplaceRuleInterface
{
    public function replace(int $n): string
    {
        return (string)$n;
    }
}
