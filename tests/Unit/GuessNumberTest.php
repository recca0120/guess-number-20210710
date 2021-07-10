<?php


namespace Tests\Unit;

use Mockery;
use PHPUnit\Framework\TestCase;

class GuessNumberTest extends TestCase
{
    private $guessNumber;

    public function setUp(): void
    {
        parent::setUp();
        $random = Mockery::mock(Random::class);
        $random->shouldReceive('getValue')->andReturn('1234');
        $this->guessNumber = new GuessNumber($random);
    }

    /**
     * @dataProvider numbersProvider
     */
    public function test_it_should_guess_number($expected, $numbers): void
    {
        self::assertEquals($expected, $this->guessNumber->guess($numbers));
    }

    public function numbersProvider(): array
    {
        return [
            ['4A0B', '1234'],
            ['0A0B', '5678'],
            ['0A4B', '2341'],
            ['0A1B', '2567'],
            ['3A0B', '0234'],
            ['1A1B', '1562'],
        ];
    }
}
