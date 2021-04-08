<?php

use PHPUnit\Framework\TestCase;
use abbdin\LinearEquation;
use abbdin\AbbdinException;

class LinearEquationTest extends TestCase {
    public function testLinearEquation() {
        $test = new LinearEquation();

        // 2x - 14 = 0
        $this->assertEquals([7], $test->linearEquation(2, -14));
        // 4x + 88 = 0
        $this->assertEquals([-22], $test->linearEquation(4, 88));

        // a == 0
        $this->expectException(AbbdinException::class);
        $test->linearEquation(0, 4);
    }
}