<?php

namespace app\modules\currency\services;

use app\modules\currency\models\Currency;

class CurrencyService
{
    private const MODEL = Currency::class;

    public static function upsert($data)
    {
        $currency = (self::MODEL)::find()
            ->where(['name' => $data->getName()])->one();
        if ($currency) {
            $currency->setAttribute('rate', $data->getRate());
        } else {
            $currency =  new Currency();
            $currency->name = $data->getName();
            $currency->rate = $data->getRate();
        }
        $currency->save();
    }
}
