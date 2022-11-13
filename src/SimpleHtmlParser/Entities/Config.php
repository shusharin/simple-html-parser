<?php

namespace SimpleHtmlParser\Entities;

use SimpleHtmlParser\Support\StaticMaker;
use SimpleHtmlParser\Support\WithScopeCollection;

class Config
{
    use StaticMaker, WithScopeCollection;

    /**
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $this->scope()->get($key, $default);
    }
}