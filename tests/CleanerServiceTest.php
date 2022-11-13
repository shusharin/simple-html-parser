<?php

use PHPUnit\Framework\TestCase;
use SimpleHtmlParser\Services\CleanerService;
use SimpleHtmlParser\Services\ConfigService;

class CleanerServiceTest extends TestCase
{
    public function testCleaner()
    {
        $source = file_get_contents(__DIR__ . '/ReaderTest.html');
        $res = CleanerService::make()->clean($source, ConfigService::make()());

        $this->assertTrue(strpos($source, "\n") !== false);
        $this->assertFalse(strpos($res, "\r"));
        $this->assertFalse(strpos($res, "\r\n"));
        $this->assertFalse(strpos($res, "\n"));
    }
}