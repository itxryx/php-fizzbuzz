<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Core;

interface ReplaceRuleInterface
{
    public function replace(int $n): string;
}
