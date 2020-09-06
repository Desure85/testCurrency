<?php

namespace app\modules\currency;

use Yii;
use yii\base\Module;
use yii\console\Application;
use yii\web\JsonParser;
use yii\web\Request;
use yii\web\Response;
use yii\rest\UrlRule;
use yii\web\UrlManager;

class BaseModule extends Module
{
    public $defaultRoute = 'default/index';

    public function init()
    {
        parent::init();
        $this->controllerNamespace = 'app\modules\currency\controllers';
        if (Yii::$app instanceof Application) {
            $this->controllerNamespace = 'app\modules\currency\commands';
        }
        Yii::$app->setComponents(
            $this->getModuleComponents(Yii::$app->getComponents())
        );
    }

    public function getModuleComponents(array $appComponents = []): array
    {
        return [
            'urlManager' => array_merge(
                ($appComponents['urlManager'] ?? []),
                [
                    'class' => UrlManager::class,
                    'enablePrettyUrl' => true,
                    'enableStrictParsing' => true,
                    'showScriptName' => false,
                ]
            ),
            'request' => [
                'class' => Request::class,
                'enableCookieValidation' => false,
                'enableCsrfValidation' => false,
            ],
            'response' => [
                'class' => Response::class,
                'format' => Response::FORMAT_JSON,
                'charset' => 'UTF-8',
            ]
        ];
    }
}
