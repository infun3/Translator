<?php

namespace app\modules\translator\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $trans_
 * @property string $name
 * @property integer $alert
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_', 'name'], 'required'],
            [['trans_', 'name'], 'string'],
            [['alert'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'trans_' => 'Trans',
            'name' => 'Name',
            'alert' => 'Alert',
        ];
    }
}
