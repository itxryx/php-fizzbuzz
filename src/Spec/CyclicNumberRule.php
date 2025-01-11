<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Spec;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;

class CyclicNumberRule implements ReplaceRuleInterface
{
    public function __construct(
        private int $base,
        private string $replacement
    ) { }

    public function replace(int $n): string
    {
        return ($n % $this->base === 0) ? $this->replacement : "";
    }
}
