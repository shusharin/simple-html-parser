<?php

namespace SimpleHtmlParser\Services;

use SimpleHtmlParser\Contracts\ContentReaderInterface;
use SimpleHtmlParser\Contracts\ParserInterface;
use SimpleHtmlParser\Entities\Collection;
use SimpleHtmlParser\Entities\Config;

class ParserService extends BaseService implements ParserInterface
{
    /**
     * @todo
     * Тут должна быть логика построчного парсинга с оценкой вложенности.
     * Как вариант, для поиска отрезков парсинга использовать символ "<".
     */
    public function parse(ContentReaderInterface $reader, Config $config): Collection
    {
        return Collection::make();
    }

}