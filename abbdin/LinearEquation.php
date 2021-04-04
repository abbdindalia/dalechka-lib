<?php

namespace abbdin;

class LinearEquation
{
    protected $x;

    public function LinearEquation($a, $b)
    {
        if ($a == 0) {
            throw new AbbdinException('Division by zero');
        }
        MyLog::log("It is a linear equation.\n\r");
        return $this->x = [(-$b) / $a];
    }
}