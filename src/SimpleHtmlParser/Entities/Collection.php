<?php

namespace SimpleHtmlParser\Entities;

use SimpleHtmlParser\Contracts\Arrayable;
use SimpleHtmlParser\Support\StaticMaker;

class Collection implements Arrayable
{
    use StaticMaker;

    protected array $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function push($item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function put($key, $val): self
    {
        if (is_null($key)) {
            $this->items[] = $val;
        } else {
            $this->items[$key] = $val;
        }
        return $this;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function map(callable $callback): Collection
    {
        $keys = array_keys($this->items);
        $items = array_map($callback, $this->items, $keys);
        return new static(array_combine($keys, $items));
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }
        return is_callable($default) ? $default() : $default;
    }

    public function toArray(): array
    {
        return array_map(fn($it) => $it instanceof Arrayable ? $it->toArray() : $it, $this->items);
    }
}