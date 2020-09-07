<?php

namespace app\components\request;

use Guzzle\Http\Client;

class CBRRequest implements IDataRequest
{
    private const URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    public function request(): array
    {
        $client = new Client();
        $res = $client->get(self::URL);
        $response = $res->send();
        if ($response->getStatusCode() === 200) {
            return $this->fill($response->getBody(true));
        }
        return  [];
    }

    private function fill(string $xml): array
    {
        $result = [];
        $loadedXml = simplexml_load_string($xml);
        foreach ($loadedXml->Valute ?? [] as $value) {
            $result[] = new CurrencyData((string)$value->CharCode, (float)$value->Value);
        }
        return $result;
    }
}
