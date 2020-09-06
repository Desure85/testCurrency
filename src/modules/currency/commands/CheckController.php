<?php

namespace app\modules\currency\commands;

use app\components\request\CRBRequest;
use app\components\request\RequestFetch;
use app\modules\currency\models\Currency;
use yii\console\Controller;
use yii\console\ExitCode;

class CheckController extends Controller
{
    public function actionIndex()
    {
        $request = new RequestFetch(new CRBRequest());
        while ($data = $request->fetch()) {
            $currency = Currency::find()
                ->where(['name' => $data->getName()])->one();
            if ($currency) {
                $currency->setAttribute('rate', $data->getRate());
                $currency->update();
            } else {
                $currency =  new Currency();
                $currency->name = $data->getName();
                $currency->rate = $data->getRate();
                $currency->save();
            }
        }
        return ExitCode::OK;
    }
}
