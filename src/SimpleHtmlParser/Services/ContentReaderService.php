<?php

namespace SimpleHtmlParser\Services;

use SimpleHtmlParser\Contracts\ContentReaderInterface;

class ContentReaderService extends BaseService implements ContentReaderInterface
{

    protected string $content;
    protected int $length;
    protected int $offset;

    public function __construct(string $content = '')
    {
        $this->setContent($content);
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        $this->length = strlen($content);
        $this->offset = 0;
        return $this;
    }

    public function readUpTo(string $search): string
    {
        if ($this->offset >= $this->length) {
            return '';
        }

        $point = strpos($this->content, $search, $this->offset);

        if ($point === false) {
            $part = substr($this->content, $this->offset, $this->length - $this->offset);
            $this->offset = $this->length;
            return (string)$part;
        }

        $part = substr($this->content, $this->offset, $point - $this->offset);
        $this->offset = $point;

        return (string)$part;
    }

    public function offset(): int
    {
        return $this->offset;
    }

    public function moveOffset(int $count): self
    {
        $this->offset += $count;
        return $this;
    }

    public function __toString()
    {
        return $this->content();
    }

    public function content(): string
    {
        return $this->content;
    }
}