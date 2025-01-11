<?php

namespace App\Data;

abstract class Data extends \Spatie\LaravelData\Data
{
    public function clone(): Data
    {
        return self::from($this->toArray());
    }
}
