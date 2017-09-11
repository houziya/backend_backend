<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zyrj_orderlist".
 *
 * @property string $id
 * @property string $userid
 * @property integer $num
 * @property string $money
 * @property integer $ordstatus
 * @property string $payment_type
 * @property string $payment_trade_no
 * @property string $payment_trade_status
 * @property string $payment_notify_id
 * @property string $payment_notify_time
 * @property string $payment_buyer_email
 * @property integer $c_type
 */
class ZyrjOrderlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_orderlist';
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
            [['userid', 'num', 'ordstatus', 'c_type'], 'integer'],
            [['money'], 'number'],
            [['c_type'], 'required'],
            [['payment_type', 'payment_trade_no', 'payment_trade_status', 'payment_notify_id', 'payment_notify_time', 'payment_buyer_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'num' => 'Num',
            'money' => 'Money',
            'ordstatus' => 'Ordstatus',
            'payment_type' => 'Payment Type',
            'payment_trade_no' => 'Payment Trade No',
            'payment_trade_status' => 'Payment Trade Status',
            'payment_notify_id' => 'Payment Notify ID',
            'payment_notify_time' => 'Payment Notify Time',
            'payment_buyer_email' => 'Payment Buyer Email',
            'c_type' => 'C Type',
        ];
    }
}
