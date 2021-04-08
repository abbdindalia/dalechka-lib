<?php

use PHPUnit\Framework\TestCase;
use abbdin\MyLog;

class MyLogTest extends TestCase {
    public function testLog() {
        $this->expectOutputString("Hello! It's me.");
        MyLog::log("Hello! It's me.");
        MyLog::write();
    }

    public function testInstance() {
        $this->assertInstanceOf(MyLog::class, MyLog::Instance());
    }

    public function testWrite() {
        $this->assertEquals('', MyLog::write(123));
        $this->assertEquals('', MyLog::write("test"));
        $this->assertEquals('', MyLog::write());
    }
}