<?php

namespace app\components\request;

use function count;

class RequestFetch
{
    private $data;
    private $iterator = 0;

    public function __construct(IDataRequest $request)
    {
        $this->data = $request->request() ?? [];
    }

    public function fetchAll(): array
    {
        return $this->data;
    }

    public function fetch(): ?CurrencyData
    {
        return $this->data[$this->iterator++] ?? null;
    }

    public function goStart(): void
    {
        $this->iterator = 0;
    }

    public function goTo(int $offset): void
    {
        $this->iterator = $offset;
    }

    public function getCount(): int
    {
        return count($this->data);
    }
}
