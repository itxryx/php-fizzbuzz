<?php
declare(strict_types=1);

namespace Itxryx\FizzBuzz\Core;

class NumberConverter {
    public function convert(int $n): string {
        if ($n % 3 === 0 && $n % 5 === 0) {
            return "FizzBuzz";
        } else if ($n % 3 === 0) {
            return "Fizz";
        } else if ($n % 5 === 0) {
            return "Buzz";
        } else {
            return (string)$n;
        }
    }
}
