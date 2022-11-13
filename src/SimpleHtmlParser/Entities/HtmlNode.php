<?php

namespace SimpleHtmlParser\Entities;

use SimpleHtmlParser\Support\StaticMaker;

/**
 * @method static self make(Tag $tag, array $attributes = [])
 */
class HtmlNode
{

    use StaticMaker;

    protected Tag $tag;

    protected array $attributes = [];

    public function __construct(Tag $tag, array $attributes = [])
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
    }

    public function setAttribute(string $key, ?string $val): self
    {
        $this->attributes[$key] = $val;
        return $this;
    }

    public function tag(): Tag
    {
        return $this->tag;
    }
}