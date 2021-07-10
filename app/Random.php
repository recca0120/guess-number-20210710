<?php

namespace App;

use function collect;

class Random
{
    public function getValue(): string
    {
        return collect(range(0, 9))
            ->shuffle()
            ->take(4)
            ->implode('');
    }
}
