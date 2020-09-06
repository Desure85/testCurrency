<?php

namespace app\modules\currency\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Currency]].
 *
 * @see Currency
 */
class CurrencyQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Currency[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Currency|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
