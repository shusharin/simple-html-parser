<?php

namespace SimpleHtmlParser\Services;

use SimpleHtmlParser\Contracts\ContentReaderInterface;
use SimpleHtmlParser\Contracts\ParserInterface;
use SimpleHtmlParser\Entities\Collection;
use SimpleHtmlParser\Entities\Config;
use SimpleHtmlParser\Entities\HtmlNode;
use SimpleHtmlParser\Entities\Tag;

class SimpleParserService extends BaseService implements ParserInterface
{

    public function parse(ContentReaderInterface $reader, Config $config): Collection
    {
        $result = Collection::make();
        preg_match_all('/<([\w-]+)(.*?)>/im', $reader->content(), $matches);

        $tags = $matches[1] ?? [];
        $attributes = $matches[2] ?? [];

        foreach ($tags as $key => $name) {
            $attr = $this->parseAttributes($attributes[$key] ?? '');
            $result->push(HtmlNode::make(Tag::make($name), $attr));
        }

        return $result;
    }

    protected function parseAttributes(string $str): array
    {
        // @todo
        return [];
    }
}