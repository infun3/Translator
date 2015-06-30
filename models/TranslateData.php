<?php

namespace infun3\translator\models;

use Yii;

/**
 * This is the model class for table "trans_data".
 *
 * @property integer $id
 * @property string $strid
 * @property string $src_file
 *
 * @property Translate $id0
 */
class TranslateData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['strid', 'src_file'], 'required'],
            [['strid'], 'string', 'max' => 32],
            [['src_file'], 'string', 'max' => 76]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'strid' => 'Strid',
            'src_file' => 'Src File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Translate::className(), ['id' => 'id']);
    }
}
