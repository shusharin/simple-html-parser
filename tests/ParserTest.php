<?php

use SimpleHtmlParser\Parser;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    public function testParser()
    {
        $parser = Parser::make();
        $res = $parser->parse(file_get_contents(__DIR__ . '/ReaderTest.html'));
        $this->assertTrue($res->count() > 0);
    }
}