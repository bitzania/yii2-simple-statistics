<?php

namespace bitzania\statistic\models;

/**
 * This is the ActiveQuery class for [[Ledger]].
 *
 * @see Ledger
 */
class LedgerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Ledger[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ledger|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
