<?php

namespace SimpleHtmlParser;

use SimpleHtmlParser\Entities\HtmlNode;
use SimpleHtmlParser\Support\StaticMaker;

class Main
{
    use StaticMaker;

    /**
     * На входе url, на выходе количество и название всех используемых html тегов.
     * @param string $url
     * @return string
     */
    public function handle(string $url): string
    {
        $res = Parser::make()->parseFromUrl($url);
        $uniqTags = array_unique($res->map(fn(HtmlNode $node) => $node->tag()->name())->toArray());

        $msg = [
            'Total tags: ' . $res->count() . '.',
            'Unique tags count: ' . count($uniqTags) . '.',
            'Tags list: ' . implode(', ', $uniqTags) . '.',
        ];

        return implode(' ', $msg);
    }
}