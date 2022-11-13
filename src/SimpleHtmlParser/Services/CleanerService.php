<?php

namespace SimpleHtmlParser\Services;

use SimpleHtmlParser\Contracts\CleanerInterface;
use SimpleHtmlParser\Entities\Config;

class CleanerService extends BaseService implements CleanerInterface
{
    public function clean(string $str, Config $config): string
    {
        $str = str_replace(["\r\n", "\r", "\n",], ' ', $str);
        // @todo ...
        return $str;
    }
}