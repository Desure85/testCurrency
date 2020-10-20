<?php

namespace app\modules\webhookTrap;

use Yii;

/**
 * webhookTrap module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\webhookTrap\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeAction($action)
    {
        if ($action->id === 'trap') {
            Yii::$app->request->enableCsrfValidation = false;
            Yii::$app->request->enableCsrfCookie = false;
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}
