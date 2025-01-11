<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Spec;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;

class PassThroughRule implements ReplaceRuleInterface
{
    public function apply(string $carry, int $n): string
    {
        return (string)$n;
    }

    public function match(string $carry, int $n): bool
    {
        return $carry === "";
    }
}
