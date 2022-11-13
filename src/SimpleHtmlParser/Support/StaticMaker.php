<?php

namespace SimpleHtmlParser\Support;

trait StaticMaker
{
    public static function make(...$args): self
    {
        return new static(...$args);
    }
}