<?php

namespace app\modules\webhookTrap\models;

/**
 * This is the ActiveQuery class for [[WebhookLog]].
 *
 * @see WebhookLog
 */
class WebhookLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WebhookLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WebhookLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
