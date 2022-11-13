<?php

namespace SimpleHtmlParser\Contracts;

use SimpleHtmlParser\Entities\Config;

interface ContentReaderInterface
{
    public function setContent(string $content): self;

    public function content(): string;
}