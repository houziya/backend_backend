<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zyrj_card".
 *
 * @property integer $id
 * @property integer $bid
 * @property string $buser_id
 * @property string $card_no
 * @property string $card_pw
 * @property integer $c_time
 * @property integer $f_time
 * @property integer $l_time
 * @property integer $b_time
 * @property integer $is_sell
 * @property integer $is_use
 * @property string $money
 * @property integer $c_type
 * @property string $bz
 */
class ZyrjCard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_card';
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
            [['bid', 'c_time', 'f_time', 'l_time', 'b_time', 'is_sell', 'is_use', 'c_type'], 'integer'],
            [['buser_id', 'card_no', 'card_pw', 'money', 'bz'], 'required'],
            [['money'], 'number'],
            [['buser_id'], 'string', 'max' => 50],
            [['card_no', 'card_pw', 'bz'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bid' => '使用者',
            'buser_id' => '拥有者',
            'card_no' => '入场券',
            'card_pw' => 'Card Pw',
            'c_time' => '生成时间',
            'f_time' => 'F Time',
            'l_time' => 'L Time',
            'b_time' => '使用时间',
            'is_sell' => 'Is Sell',
            'is_use' => '使用状态',
            'money' => 'Money',
            'c_type' => 'C Type',
            'bz' => 'Bz',
        ];
    }
}
