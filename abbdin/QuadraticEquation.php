<?php

namespace abbdin;

use core\EquationInterface;

class QuadraticEquation extends LinearEquation implements EquationInterface{

    protected function discriminant($a, $b, $c){
        return pow($b, 2) - 4 * $a * $c;
    }

    public function solve($a, $b, $c){
        if ($a == 0) {
            return $this -> LinearEquation($b, $c);
        }

        $d = $this -> discriminant($a, $b, $c);

        MyLog::log("It is a quad equation.\n\r");
        if ($d == 0) {
            return $this -> x = [(-$b) / (2 * $a)];
        }

        if ($d < 0) {
            throw new AbbdinException('It is impossible to solve the quadratic equation');
        }
        return $this -> x = [((-$b) - sqrt($d)) / (2 * $a), ((-$b) + sqrt($d)) / (2 * $a)];
    }
}