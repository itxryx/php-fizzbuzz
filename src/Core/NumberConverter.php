<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Core;

class NumberConverter {
    public function convert(int $n): string {
        if ($n === 3) {
            return "Fizz";
        } else {
            return (string)$n;
        }
    }
}
