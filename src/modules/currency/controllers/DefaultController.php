<?php

namespace app\modules\currency\controllers;

use yii\rest\ActiveController;
use app\modules\currency\models\Currency;

class DefaultController extends ActiveController
{
    public $modelClass = Currency::class;
}
