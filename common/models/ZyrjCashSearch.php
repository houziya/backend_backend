<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "zyrj_cash".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $user_id
 * @property string $bid
 * @property string $b_user_id
 * @property string $sid
 * @property string $s_user_id
 * @property integer $rdt
 * @property string $money
 * @property string $money_two
 * @property integer $epoint
 * @property integer $is_pay
 * @property string $user_name
 * @property string $bank_name
 * @property string $bank_card
 * @property string $x1
 * @property string $x2
 * @property string $x3
 * @property string $x4
 * @property string $sellbz
 * @property string $s_type
 * @property integer $is_buy
 * @property integer $bdt
 * @property integer $ldt
 * @property integer $okdt
 * @property string $bz
 * @property integer $is_sh
 * @property integer $is_cancel
 * @property integer $type
 * @property integer $pdt
 * @property integer $is_done
 * @property integer $is_get
 * @property integer $match_num
 * @property integer $finish_num
 * @property string $match_id
 * @property string $money_type
 * @property integer $is_out
 * @property integer $lock_time
 * @property string $img
 * @property integer $money_key
 * @property integer $is_ts
 * @property string $ts_img
 * @property integer $is_timeout
 */
class ZyrjCashSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_cash';
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
            [['uid', 'user_id', 'bid', 'sid', 's_user_id', 'money_two', 'user_name', 'bank_name', 'bank_card', 'sellbz', 'bz', 'type', 'pdt', 'is_get', 'match_num', 'finish_num', 'match_id', 'money_type', 'is_out', 'lock_time', 'img', 'money_key', 'is_ts', 'ts_img', 'is_timeout'], 'required'],
            [['uid', 'rdt', 'epoint', 'is_pay', 'is_buy', 'bdt', 'ldt', 'okdt', 'is_sh', 'type', 'pdt', 'is_done', 'is_get', 'match_num', 'finish_num', 'is_out', 'lock_time', 'money_key', 'is_ts', 'is_timeout'], 'integer'],
            [['bid', 'b_user_id', 'sid', 's_user_id', 'sellbz', 'bz'], 'string'],
            [['money', 'money_two'], 'number'],
            [['user_id', 'bank_card', 'x1', 'x2', 'x3', 'x4'], 'string', 'max' => 50],
            [['user_name', 'bank_name', 's_type', 'match_id', 'money_type', 'img', 'ts_img'], 'string', 'max' => 200],
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
            'user_id' => 'User ID',
            'bid' => 'Bid',
            'b_user_id' => 'B User ID',
            'sid' => 'Sid',
            's_user_id' => 'S User ID',
            'rdt' => 'Rdt',
            'money' => 'Money',
            'money_two' => 'Money Two',
            'epoint' => 'Epoint',
            'is_pay' => 'Is Pay',
            'user_name' => 'User Name',
            'bank_name' => 'Bank Name',
            'bank_card' => 'Bank Card',
            'x1' => 'X1',
            'x2' => 'X2',
            'x3' => 'X3',
            'x4' => 'X4',
            'sellbz' => 'Sellbz',
            's_type' => 'S Type',
            'is_buy' => 'Is Buy',
            'bdt' => 'Bdt',
            'ldt' => 'Ldt',
            'okdt' => 'Okdt',
            'bz' => 'Bz',
            'is_sh' => 'Is Sh',
            'is_cancel' => 'Is Cancel',
            'type' => 'Type',
            'pdt' => 'Pdt',
            'is_done' => 'Is Done',
            'is_get' => 'Is Get',
            'match_num' => 'Match Num',
            'finish_num' => 'Finish Num',
            'match_id' => 'Match ID',
            'money_type' => 'Money Type',
            'is_out' => 'Is Out',
            'lock_time' => 'Lock Time',
            'img' => 'Img',
            'money_key' => 'Money Key',
            'is_ts' => 'Is Ts',
            'ts_img' => 'Ts Img',
            'is_timeout' => 'Is Timeout',
        ];
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $type = 0)
    {
        $query = ZyrjCash::find()->where(['type' => $type]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'pdt' => $this->pdt
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name]);
        $query->andFilterWhere(['like', 'user_tel', $this->user_tel]);
        $query->andFilterWhere(['like', 'nickname', $this->nickname]);
        return $dataProvider;
    }
}
