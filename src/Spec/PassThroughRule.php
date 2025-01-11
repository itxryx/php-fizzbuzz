<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Spec;

use Itxryx\FizzBuzz\Core\ReplaceRuleInterface;

class PassThroughRule implements ReplaceRuleInterface
{
    public function __construct(
        private array $exceptionalNumbers
    ) { }

    public function replace(int $n): string
    {
        foreach ($this->exceptionalNumbers as $exceptionalNumber) {
            if ($n % $exceptionalNumber === 0) {
                return "";
            }
        }
        return (string)$n;
    }
}
