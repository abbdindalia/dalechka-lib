<?php

namespace abbdin;

use core\LogAbstract;
use core\LogInterface;

class MyLog extends LogAbstract implements LogInterface
{
    public static function log(string $str): void
    {
        self::Instance()->_log($str);
    }

    public function _log($str)
    {
        $this->log[] = $str;
    }

    public static function write(): void
    {
        LogAbstract::Instance()->_write();
    }

    public function _write()
    {
        $log = '';
        foreach($this->log as $value)
        {
            $log .= $value."\n";
        }
        echo $log;
        $d = new \DateTime();
        $file = "./Log/". $d->format('d-m-Y\TH_i_s.u').".log";
        if (!is_dir('./Log/'))
        {
            mkdir("./Log/");
        }
        file_put_contents($file,$log);
    }
}