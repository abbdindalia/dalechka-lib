<?php

namespace abbdin;

use core\LogAbstract;
use core\LogInterface;

class MyLog extends LogAbstract implements LogInterface
{
    public static function log($str)
    {
        self::Instance()->_log($str);
    }

    public function _log($str)
    {
        $this->log[] = $str;
    }

    public static function write()
    {
        LogAbstract::Instance()->_write();
    }

    public function _write()
    {
        foreach ($this->log as $value) {
            echo $value;
        }
        $d = new \DateTime();
        $file = "./Log/". $d->format('d-m-Y\TH_i_s_u').".log";
        if (!is_dir('./Log/'))
        {
            mkdir("./Log/");
        }
        file_put_contents($file, $this->log);
    }
}