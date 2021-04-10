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

    function testLogFileContent() {
        $expectedString = "Test";
        $logTime = time();
        $logFileDir = __DIR__ . "/logs/$logTime.log";

        MyLog::log($expectedString);
        MyLog::write();

        $logFileContent = file_get_contents($logFileDir);

        $this->assertEquals($expectedString, $logFileContent);
        $this->expectOutputString($expectedString);
    }

    function testCheckLogFileExist() {
        MyLog::log(__DIR__);

        $logsCounter = 0;

        foreach (glob(__DIR__ . "/logs/*.log") as $filename) {
            $logsCounter += 1;
        }

        MyLog::log($logsCounter);

        MyLog::write();

        foreach (glob(__DIR__ . "/logs/*.log") as $filename) {
            $logsCounter -= 1;
        }

        $this->assertEquals(0, $logsCounter);
    }
}