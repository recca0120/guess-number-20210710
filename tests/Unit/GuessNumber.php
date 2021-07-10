<?php

namespace Tests\Unit;

class GuessNumber
{
    private $numbers;

    /**
     * GuessNumber constructor.
     */
    public function __construct(Random $random)
    {
        $this->numbers = $random->getValue();
    }

    public function guess(string $numbers): string
    {
        $a = 0;
        $b = 0;
        for ($i = 0, $iMax = strlen($numbers); $i < $iMax; $i++) {
            $number = $numbers[$i];
            $position = strpos($this->numbers, $number);
            if ($position !== false) {
                $i === $position ? $a++ : $b++;
            }
        }

        return sprintf('%dA%dB', $a, $b);
    }
}
