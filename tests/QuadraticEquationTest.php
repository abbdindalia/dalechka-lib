<?php

use PHPUnit\Framework\TestCase;
use abbdin\QuadraticEquation;
use abbdin\AbbdinException;

class QuadraticEquationTest extends TestCase {
    public function testSolve() {
        $test = new QuadraticEquation();

        // x^2 − 2x − 3 = 0
        $this->assertEquals([-1, 3], $test->solve(1, -2, -3));
        // 4x^2 + 21x + 5 = 0
        $this->assertEquals([-5, -0.25], $test->solve(4, 21, 5));

        // x^2 + 12x + 36 = 0 (discriminant = 0)
        $this->assertEquals([-6], $test->solve(1, 12, 36));
        // a = 0
        $this->assertEquals([4], $test->solve(0, 25, -100));

        // 2x^2 - 4x + 40 = 0 (discriminant < 0)
        $this->expectException(AbbdinException::class);
        $test->solve(2, -4, 40);
    }
}