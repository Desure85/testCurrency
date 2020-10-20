<?php

namespace app\modules\webhookTrap\models;

use Yii;

/**
 * This is the model class for table "webhook_log".
 *
 * @property int $id
 * @property string $webhook_id
 * @property string|null $method
 * @property string|null $headers
 * @property string|null $body
 * @property int|null $created_at
 */
class WebhookLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webhook_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['webhook_id'], 'required'],
            [['headers', 'body'], 'string'],
            [['created_at', 'webhook_id'], 'integer'],
            [['method'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'webhook_id' => 'Webhook ID',
            'method' => 'Method',
            'headers' => 'Headers',
            'body' => 'Body',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WebhookLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WebhookLogQuery(get_called_class());
    }
}
