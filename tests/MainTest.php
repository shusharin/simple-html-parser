<?php

use PHPUnit\Framework\TestCase;
use SimpleHtmlParser\Main;

class MainTest extends TestCase
{
    public function testMain()
    {
        $res = explode('. ', Main::make()->handle('https://www.google.com/'));

        echo PHP_EOL . 'Main test: ' . PHP_EOL;
        foreach ($res as $row) {
            echo $row . PHP_EOL;
        }
        $this->assertTrue(true);
    }

}