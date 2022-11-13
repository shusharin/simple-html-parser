<?php

namespace SimpleHtmlParser;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use SimpleHtmlParser\Contracts\CleanerInterface;
use SimpleHtmlParser\Contracts\ContentReaderInterface;
use SimpleHtmlParser\Contracts\ParserInterface;
use SimpleHtmlParser\Entities\Collection;
use SimpleHtmlParser\Entities\Config;
use SimpleHtmlParser\Services\CleanerService;
use SimpleHtmlParser\Services\ConfigService;
use SimpleHtmlParser\Services\ContentReaderService;
use SimpleHtmlParser\Services\SimpleParserService;
use SimpleHtmlParser\Support\StaticMaker;

class Parser
{

    use StaticMaker;

    protected ContentReaderInterface $reader;

    protected ParserInterface $parser;

    protected CleanerInterface $cleaner;

    protected Config $config;

    public function __construct(Config $config = null)
    {

        $this->config = $config ?? ConfigService::make()();

        $this
            ->setCleaner(CleanerService::make())
            ->setContentReader(ContentReaderService::make())
            ->setParser(SimpleParserService::make());
    }

    public function setContentReader(ContentReaderInterface $reader): self
    {
        $this->reader = $reader;
        return $this;
    }

    public function setParser(ParserInterface $parser): self
    {
        $this->parser = $parser;
        return $this;
    }

    public function setCleaner(CleanerInterface $cleaner): self
    {
        $this->cleaner = $cleaner;
        return $this;
    }

    public function parseFromUrl(
        string $url, ?ClientInterface $client = null, ?RequestInterface $request = null): Collection
    {
        $client = $client ?? new Client;
        $request = $request ?? new Request('GET', $url);

        $response = $client->sendRequest($request);
        $content = $response->getBody()->getContents();

        return $this->parse($content);
    }

    public function parse(string $content): Collection
    {
        if ($this->config->get('is_clean')) {
            $content = $this->cleaner->clean($content, $this->config);
        }
        return $this->parser->parse($this->reader->setContent($content), $this->config);
    }
}