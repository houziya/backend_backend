<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "zyrj_fck".
 *
 * @property integer $id
 * @property string $account
 * @property string $bind_account
 * @property integer $new_login_time
 * @property string $new_login_ip
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $login_count
 * @property string $verify
 * @property string $email
 * @property string $remark
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 * @property integer $type_id
 * @property string $info
 * @property string $name
 * @property integer $dept_id
 * @property string $user_id
 * @property string $user_name
 * @property string $password
 * @property string $pwd1
 * @property string $passopen
 * @property string $pwd2
 * @property string $passopentwo
 * @property string $pwd3
 * @property string $nickname
 * @property string $qq
 * @property string $bank_name
 * @property string $bank_card
 * @property string $bank_province
 * @property string $bank_city
 * @property string $bank_address
 * @property string $user_code
 * @property string $user_address
 * @property string $user_post
 * @property string $user_tel
 * @property string $user_phone
 * @property integer $rdt
 * @property integer $treeplace
 * @property integer $father_id
 * @property string $father_name
 * @property integer $re_id
 * @property string $re_name
 * @property integer $is_pay
 * @property integer $is_null
 * @property integer $is_lock
 * @property integer $is_lock_ok
 * @property integer $shoplx
 * @property string $shop_a
 * @property string $shop_b
 * @property integer $is_agent
 * @property string $agent_max
 * @property string $agent_use
 * @property string $agent_cash
 * @property string $agent_kt
 * @property string $agent_xf
 * @property string $agent_cf
 * @property string $agent_gp
 * @property string $agent_gw
 * @property integer $gp_num
 * @property string $agent_lock
 * @property string $live_gupiao
 * @property integer $all_in_gupiao
 * @property integer $all_out_gupiao
 * @property integer $p_out_gupiao
 * @property integer $no_out_gupiao
 * @property integer $ok_out_gupiao
 * @property integer $yuan_gupiao
 * @property integer $all_gupiao
 * @property integer $tx_num
 * @property string $lssq
 * @property string $zsq
 * @property integer $adt
 * @property integer $l
 * @property integer $r
 * @property integer $benqi_l
 * @property integer $benqi_r
 * @property integer $shangqi_l
 * @property integer $shangqi_r
 * @property integer $peng_num
 * @property integer $num_l
 * @property integer $num_r
 * @property integer $num_lr
 * @property integer $u_level
 * @property integer $y_level
 * @property integer $is_boss
 * @property integer $idt
 * @property integer $pdt
 * @property integer $re_level
 * @property integer $p_level
 * @property string $re_path
 * @property string $p_path
 * @property string $tp_path
 * @property integer $is_del
 * @property integer $shop_id
 * @property string $shop_name
 * @property string $shop_uname
 * @property string $b0
 * @property string $b1
 * @property string $b2
 * @property string $b3
 * @property string $b4
 * @property string $b5
 * @property string $b6
 * @property string $b7
 * @property string $b8
 * @property string $b9
 * @property string $b12
 * @property string $b11
 * @property string $b10
 * @property integer $wlf
 * @property string $wlf_money
 * @property string $cpzj
 * @property string $y_cpzj
 * @property string $zjj
 * @property string $re_money
 * @property string $cz_epoint
 * @property integer $lr
 * @property integer $shangqi_lr
 * @property integer $benqi_lr
 * @property string $user_type
 * @property string $re_peat_money
 * @property integer $re_nums
 * @property integer $re_nums_b
 * @property integer $re_nums_l
 * @property integer $re_nums_r
 * @property string $duipeng
 * @property integer $_times
 * @property integer $fanli
 * @property integer $fanli_time
 * @property integer $fanli_num
 * @property string $fanli_money
 * @property integer $is_fenh
 * @property integer $open
 * @property integer $singular
 * @property integer $new_agent
 * @property string $day_feng
 * @property integer $get_date
 * @property integer $get_numb
 * @property integer $is_jb
 * @property integer $sq_jb
 * @property integer $jb_sdate
 * @property integer $jb_idate
 * @property integer $man_ceng
 * @property string $prem
 * @property integer $wang_j
 * @property integer $wang_t
 * @property integer $get_level
 * @property integer $is_xf
 * @property string $xf_money
 * @property integer $is_zy
 * @property integer $zyi_date
 * @property integer $zyq_date
 * @property string $mon_get
 * @property string $xy_money
 * @property string $xx_money
 * @property integer $down_num
 * @property integer $u_pai
 * @property integer $n_pai
 * @property integer $ok_pay
 * @property string $wenti
 * @property string $wenti_dan
 * @property integer $is_tj
 * @property integer $re_f4
 * @property integer $is_aa
 * @property integer $is_bb
 * @property string $us_img
 * @property integer $x_pai
 * @property integer $x_out
 * @property integer $x_num
 * @property integer $is_lockqd
 * @property integer $is_lockfh
 * @property integer $seller_rate
 * @property string $g_level_a
 * @property integer $g_level_b
 * @property string $re_cpzj
 * @property string $pro_id
 * @property integer $gdt
 * @property integer $end_time
 * @property string $xiaofei_money
 * @property string $gp_divi_count
 * @property integer $b_apply_agent
 * @property string $quyu
 * @property string $chat
 * @property string $zhifuPay
 * @property string $weixinWalet
 * @property string $caifuPay
 * @property integer $jingli
 * @property integer $zongjian
 * @property integer $dongshi
 * @property integer $ca_numb
 * @property integer $h4
 * @property integer $h5
 * @property integer $h6
 * @property integer $oldjing
 * @property integer $olddong
 * @property integer $h7
 */
class ZyrjFckSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_fck';
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
            [['id'], 'integer'],
            [['user_name', 'nickname', 'user_id'], 'string'],
            [['user_tel'], 'number']
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ZyrjFck::find();

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
