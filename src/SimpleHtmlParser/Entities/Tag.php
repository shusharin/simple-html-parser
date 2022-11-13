<?php

namespace SimpleHtmlParser\Entities;

use SimpleHtmlParser\Support\StaticMaker;

/**
 * @method static self make(string $name)
 */
class Tag
{
    use StaticMaker;

    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}