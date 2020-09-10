<?php

namespace app\components\request;

use function count;

class RequestFetch implements \Iterator, \Countable
{
    private $data;
    private $iterator = 0;

    public function __construct(IDataRequest $request)
    {
        $this->data = $request->request() ?? [];
    }

    public function next(): ?CurrencyData
    {
        return $this->data[++$this->iterator] ?? null;
    }

    public function rewind(): void
    {
        $this->iterator = 0;
    }

    public function current(): ?CurrencyData
    {
        return $this->data[$this->iterator] ?? null;
    }


    public function key(): int
    {
        return $this->iterator;
    }

    public function valid(): bool
    {
        return isset($this->data[$this->iterator]);
    }

    public function count(): int
    {
        return count($this->data);
    }
}
