<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zyrj_phone_sms".
 *
 * @property integer $id
 * @property string $phone
 * @property string $code
 * @property string $ip
 * @property string $send_content
 * @property string $send_result
 * @property integer $create_time
 */
class ZyrjPhoneSms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_phone_sms';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['send_result'], 'string'],
            [['create_time'], 'integer'],
            [['phone', 'ip'], 'string', 'max' => 15],
            [['code'], 'string', 'max' => 10],
            [['send_content'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'code' => 'Code',
            'ip' => 'Ip',
            'send_content' => 'Send Content',
            'send_result' => 'Send Result',
            'create_time' => 'Create Time',
        ];
    }
}
