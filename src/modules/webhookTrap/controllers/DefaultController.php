<?php

namespace app\modules\webhookTrap\controllers;

use app\modules\webhookTrap\models\Webhook;
use app\modules\webhookTrap\models\WebhookLog;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Default controller for the `webhookTrap` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $provider = new ActiveDataProvider(
            [
                'query' => Webhook::find(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]
        );
        return $this->render(
            'index',
            [
                'provider' => $provider
                ]
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreate()
    {
        $model = new Webhook();
        if (!Yii::$app->request->getIsPost()) {
            return $this->render(
                'create',
                [
                    'model' => $model,
                ]
            );
        }
        $model->load(Yii::$app->request->post());
        $model->save();
        Yii::info('Succesfuly create');
        return $this->redirect('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionUpdate($id)
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionView($id)
    {
        $provider = new ActiveDataProvider(
            [
                'query' => WebhookLog::find()
                    ->where(['webhook_id' => $id]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]
        );
        return $this->render(
            'view',
            [
                'provider' => $provider
            ]
        );
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionDelete($id)
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionTrap(string $uri)
    {
        $hook = Webhook::find()->where(['uri' => $uri])->one();
        if ($hook) {
            $hookLog = new WebhookLog();
            $hookLog->created_at = \time();
            $hookLog->headers = \json_encode(Yii::$app->request->headers->toArray(), JSON_UNESCAPED_UNICODE);
            $hookLog->body = \json_encode((Yii::$app->request->post()), JSON_UNESCAPED_UNICODE);
            $hookLog->webhook_id = $hook->id;
            $hookLog->save();
        } else {
            throw new HttpException('Not valid hook');
        }
        return true;
    }
}
