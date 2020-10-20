<?php

namespace app\modules\webhookTrap\models;

use Yii;

/**
 * This is the model class for table "webhook".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $uri
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Webhook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webhook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'uri'], 'required'],
            ['uri', 'unique'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'uri'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'uri' => 'Uri',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WebhookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WebhookQuery(get_called_class());
    }
}
