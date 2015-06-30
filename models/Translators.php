<?php

namespace infun3\translator\models;


use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "translators".
 *
 * @property integer $id
 * @property string $src
 * @property string $dst
 *
 * @property User $id0
 */

class Translators extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $users;
    public $username;
    public static function tableName()
    {
        return 'translators';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'src', 'dst'], 'required'],
            [['id'], 'integer'],
            [['src', 'dst'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Source',
            'dst' => 'Destination',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     *
     */

    public function getUsers()
    {
        return  (new \yii\db\Query())->select(['id','username'])->from('user')->all();
    }
    public function getLanguages()
    {
        return  (new \yii\db\Query())->select(['short','full'])->from('languages')->all();
    }

        public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
    public function getUser()
    {
    //        return $this->hasOne(User::getUser(), ['id' => 'id']);
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}