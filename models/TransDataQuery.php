<?php

namespace infun3\translator\models;

/**
 * This is the ActiveQuery class for [[TransData]].
 *
 * @see TransData
 */
class TransDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TransData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TransData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}