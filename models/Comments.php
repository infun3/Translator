<?php

namespace infun3\translator\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $str_id
 * @property string $timestamp
 * @property string $comment
 *
 * @property TransData $str
 * @property User $u
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'comment'], 'required'],
            [['uid', 'str_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['comment'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'str_id' => 'Str ID',
            'timestamp' => 'Timestamp',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function beforeValidate()
    {

    isset($this->str_id)?:$this->str_id = Yii::$app->request->get('id');
        $this->uid = Yii::$app->user->identity->id;
       // $this->setAttributes(['uid'=>Yii::$app->user->identity->id]);
        return parent::beforeValidate();
    }
    public function getStr()
    {
        return $this->hasOne(TransData::className(), ['id' => 'str_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
