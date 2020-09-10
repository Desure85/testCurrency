<?php

namespace app\components\http;

use Psr\Http\Message\ResponseInterface;
use Yii;

class Client
{
    public function get($uri): ?ResponseInterface
    {
        $client = new \GuzzleHttp\Client();
        try {
            return $client->get($uri);
        } catch (\Throwable $e) {
            Yii::error($e->getMessage());
        }
        return null;
    }
}
