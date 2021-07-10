<?php

namespace Tests\Unit;

use App\Random;
use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{
    public function test_it_should_get_4_unique_numbers(): void
    {
        $random = new Random();
        $numbers = $random->getValue();

        self::assertSame(strlen(count_chars($numbers, 3)), 4);
        self::assertMatchesRegularExpression('/\d+/', $numbers);
    }
}
