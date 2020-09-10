<?php

namespace app\components\request;

use app\components\http\Client;

class CBRRequest implements IDataRequest
{
    private const URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    public function request(): array
    {
        $response = (new Client())->get(self::URL);
        if ($response !== null && $response->getStatusCode() === 200) {
            return $this->fill($response->getBody());
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
