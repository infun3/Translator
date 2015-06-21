<?php

namespace app\modules\translator\models;


use Yii;

/**
 * This is the model class for table "trans".
 *
 * @property integer $id
 * @property string $str
 * @property integer $user_id
 * @property integer $alert
 */
class Translate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $source;
	public $yandex;
	protected static $table;

	public static function tableName()
	{
		return self::$table;
	}

	/* UPDATE */
	public static function setTableName($table)
	{
		self::$table = 'trans_'.$table;
	}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['str', 'user_id'], 'required'],
            [['str'], 'string'],
            [['user_id', 'alert'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'str' => 'Str',
            'user_id' => 'User ID',
            'alert' => 'Alert',
        ];
    }
}
