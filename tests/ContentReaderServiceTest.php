<?php

use PHPUnit\Framework\TestCase;
use SimpleHtmlParser\Services\ContentReaderService;

class ContentReaderServiceTest extends TestCase
{

    protected static ?ContentReaderService $reader;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::$reader = ContentReaderService::make(file_get_contents(__DIR__ . '/ReaderTest.html'));
    }

    /**
     * @dataProvider providerBaseReadUpTo
     */
    public function testBaseReadUpTo($content, $search, $expected)
    {
        $this->assertEquals($expected, ContentReaderService::make($content)->readUpTo($search));
    }

    public function providerBaseReadUpTo(): array
    {
        return [
            ['1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'A', '1234567890'],
            ['1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'H', '1234567890ABCDEFG'],
            ['<div>ABC<span>TEST<i>html</i></span></div>', '</', '<div>ABC<span>TEST<i>html'],
        ];
    }

    /**
     * @dataProvider providerReadUpTo
     */
    public function testReadUpTo($search, $expected)
    {
        $result = self::$reader->readUpTo($search);
        self::$reader->moveOffset(2);
        $this->assertEquals($expected, $result);
    }

    public function providerReadUpTo(): array
    {
        return [
            ['</', '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>'],

            [
                '</', 'title>
'
            ],
            [
                '</', 'head>
<body>
<header>
    <a href="/">Brand'
            ],
            [
                '<p>', 'a>
    <nav>
        <ul>
            <li><a href="/one">one</a></li>
            <li><a href="/two">two</a></li>
            <li><a href="/three">three</a></li>
            <li><a href="/four">four</a></li>
        </ul>
    </nav>
</header>
<section>
    <h1>Title</h1>
    '
            ],
        ];
    }
}