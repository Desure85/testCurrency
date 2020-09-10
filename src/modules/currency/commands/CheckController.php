<?php

namespace app\modules\currency\commands;

use app\components\request\CBRRequest;
use app\components\request\RequestFetch;
use app\modules\currency\services\CurrencyService;
use yii\console\Controller;
use yii\console\ExitCode;

class CheckController extends Controller
{
    public function actionIndex(): int
    {
        $request = new RequestFetch(new CBRRequest());
        foreach ($request as $currencyData) {
            CurrencyService::upsert($currencyData);
        }
        return ExitCode::OK;
    }
}
