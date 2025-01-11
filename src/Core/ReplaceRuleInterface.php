<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Core;

interface ReplaceRuleInterface
{
    public function apply(string $carry, int $n): string;
    public function match(string $carry, int $n): bool;
}
