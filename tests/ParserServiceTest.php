<?php

use SimpleHtmlParser\Services\ConfigService;
use SimpleHtmlParser\Services\ContentReaderService;
use SimpleHtmlParser\Services\ParserService;

class ParserServiceTest extends \PHPUnit\Framework\TestCase
{

    public function testParser()
    {
        $reader = ContentReaderService::make()
            ->setContent(file_get_contents(__DIR__ . '/ReaderTest.html'));
        $res = ParserService::make()->parse($reader, ConfigService::make()());
        $this->assertEquals(0, $res->count());
    }

}