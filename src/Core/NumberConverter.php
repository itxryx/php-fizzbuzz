<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Core;

class NumberConverter
{
    /**
     * @param ReplaceRuleInterface[] $rules
     */
    public function __construct(
        protected array $rules
    ){ }

    public function convert(int $n): string
    {
        return $this->rules[0]->replace($n);
    }
}
