<?php

namespace SimpleHtmlParser\Contracts;

use SimpleHtmlParser\Entities\Collection;
use SimpleHtmlParser\Entities\Config;

interface ParserInterface
{
    public function parse(ContentReaderInterface $reader, Config $config): Collection;
}