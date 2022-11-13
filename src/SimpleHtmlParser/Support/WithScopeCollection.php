<?php

namespace SimpleHtmlParser\Support;

use SimpleHtmlParser\Entities\Collection;

trait WithScopeCollection
{
    private ?Collection $scope = null;

    protected function scope(): Collection
    {
        if (!$this->scope) {
            $this->scope = Collection::make();
        }
        return $this->scope;
    }

    /**
     * @param string|array $key
     * @param mixed $value
     * @return $this
     */
    public function with($key, $value = null): self
    {
        if (is_array($key)) {
            foreach ($key as $var => $val) {
                $this->scope()->put((string)$var, $val);
            }
            return $this;
        }

        $this->scope()->put((string)$key, $value);

        return $this;
    }
}