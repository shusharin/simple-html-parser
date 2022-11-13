<?php

namespace SimpleHtmlParser\Contracts;

use SimpleHtmlParser\Entities\Config;

interface CleanerInterface
{
    public function clean(string $str, Config $config): string;
}