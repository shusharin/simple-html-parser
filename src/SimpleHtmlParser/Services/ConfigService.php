<?php

namespace SimpleHtmlParser\Services;

use SimpleHtmlParser\Entities\Config;

class ConfigService extends BaseService
{
    public function __invoke(): Config
    {
        return Config::make()->with($this->getProps());
    }

    protected function getPath(): string
    {
        return __DIR__ . '/../config/simple-html-parser.php';
    }

    protected function getProps(): array
    {
        $path = $this->getPath();
        return file_exists($path) ? require $path : [];
    }
}