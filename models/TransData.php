<?php

namespace app\modules\translator\models;

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
class TransData extends \yii\db\ActiveRecord
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
            [[ 'src_file'], 'required'],
            [ 'string', 'max' => 32],
            [ 'string', 'max' => 76]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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

    /**
     * @inheritdoc
     * @return TransDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransDataQuery(get_called_class());
    }
}
