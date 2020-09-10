<?php

namespace app\components\http;

use Psr\Http\Message\ResponseInterface;

interface IClient
{
    public function get(string $uri): ?ResponseInterface;
}
