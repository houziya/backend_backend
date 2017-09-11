<?php

namespace common\models;

use Yii;

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
class ZyrjFck extends \yii\db\ActiveRecord
{
    public static $memberIsLockText = [
        0 => "正常",
        1 => "已锁定"
    ];

    public static $memberIsAgentText = [
        0 => "否",
        2 => "是"
    ];
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
            [['new_login_time', 'last_login_time', 'login_count', 'create_time', 'update_time', 'status', 'type_id', 'dept_id', 'rdt', 'treeplace', 'father_id', 're_id', 'is_pay', 'is_null', 'is_lock', 'is_lock_ok', 'shoplx', 'is_agent', 'gp_num', 'all_in_gupiao', 'all_out_gupiao', 'p_out_gupiao', 'no_out_gupiao', 'ok_out_gupiao', 'yuan_gupiao', 'all_gupiao', 'tx_num', 'adt', 'l', 'r', 'benqi_l', 'benqi_r', 'shangqi_l', 'shangqi_r', 'peng_num', 'num_l', 'num_r', 'num_lr', 'u_level', 'y_level', 'is_boss', 'idt', 'pdt', 're_level', 'p_level', 'is_del', 'shop_id', 'wlf', 'lr', 'shangqi_lr', 'benqi_lr', 're_nums', 're_nums_b', 're_nums_l', 're_nums_r', '_times', 'fanli', 'fanli_time', 'fanli_num', 'is_fenh', 'open', 'singular', 'new_agent', 'get_date', 'get_numb', 'is_jb', 'sq_jb', 'jb_sdate', 'jb_idate', 'man_ceng', 'wang_j', 'wang_t', 'get_level', 'is_xf', 'is_zy', 'zyi_date', 'zyq_date', 'down_num', 'u_pai', 'n_pai', 'ok_pay', 'is_tj', 're_f4', 'is_aa', 'is_bb', 'x_pai', 'x_out', 'x_num', 'is_lockqd', 'is_lockfh', 'seller_rate', 'g_level_b', 'gdt', 'end_time', 'gp_divi_count', 'b_apply_agent', 'jingli', 'zongjian', 'dongshi', 'ca_numb', 'h4', 'h5', 'h6', 'oldjing', 'olddong', 'h7'], 'integer'],
            [['new_login_ip', 'create_time', 'password', 'passopen', 'nickname', 'qq', 'bank_province', 'bank_city', 'bank_address', 'user_code', 'user_address', 'user_post', 'user_tel', 'user_phone', 'rdt', 'father_id', 'father_name', 're_id', 're_name', 'is_pay', 'is_lock', 'shoplx', 'shop_a', 'shop_b', 'is_agent', 'agent_max', 'agent_use', 'agent_cash', 'lssq', 'zsq', 'adt', 'l', 'r', 'benqi_l', 'benqi_r', 'shangqi_l', 'shangqi_r', 'u_level', 'is_boss', 'idt', 'pdt', 're_level', 'p_level', 're_path', 'p_path', 'tp_path', 'is_del', 'shop_id', 'shop_name', 'shop_uname', 'b0', 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b12', 'b11', 'b10', 'wlf', 'cpzj', 'lr', 'shangqi_lr', 'benqi_lr', 'user_type', 're_peat_money', 'duipeng', '_times', 'fanli', 'fanli_time', 'fanli_num', 'is_fenh', 'open', 'prem', 'wenti', 'wenti_dan', 'us_img', 'is_lockqd', 'is_lockfh', 're_cpzj', 'pro_id', 'gdt', 'end_time', 'xiaofei_money', 'quyu', 'chat', 'weixinWalet', 'caifuPay', 'ca_numb', 'h4', 'h5', 'h6', 'oldjing', 'olddong', 'h7'], 'required'],
            [['info', 're_path', 'p_path', 'tp_path', 'prem', 'pro_id'], 'string'],
            [['agent_max', 'agent_use', 'agent_cash', 'agent_kt', 'agent_xf', 'agent_cf', 'agent_gp', 'agent_gw', 'agent_lock', 'live_gupiao', 'lssq', 'zsq', 'b0', 'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b12', 'b11', 'b10', 'wlf_money', 'cpzj', 'y_cpzj', 'zjj', 're_money', 'cz_epoint', 're_peat_money', 'duipeng', 'fanli_money', 'day_feng', 'xf_money', 'mon_get', 'xy_money', 'xx_money', 're_cpzj', 'xiaofei_money'], 'number'],
            [['account'], 'string', 'max' => 64],
            [['bind_account', 'email', 'pwd1', 'pwd2', 'pwd3', 'shop_name'], 'string', 'max' => 50],
            [['new_login_ip', 'last_login_ip'], 'string', 'max' => 40],
            [['verify'], 'string', 'max' => 32],
            [['remark', 'shop_uname', 'wenti', 'wenti_dan', 'us_img'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 25],
            [['user_id', 'user_name', 'password', 'passopen', 'passopentwo', 'nickname', 'qq', 'bank_name', 'bank_card', 'bank_province', 'bank_city', 'bank_address', 'user_code', 'user_address', 'user_post', 'user_tel', 'user_phone', 'father_name', 're_name', 'shop_a', 'shop_b', 'user_type', 'g_level_a', 'quyu', 'chat', 'zhifuPay', 'weixinWalet', 'caifuPay'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => '昵称',
            'bind_account' => 'Bind Account',
            'new_login_time' => 'New Login Time',
            'new_login_ip' => 'New Login Ip',
            'last_login_time' => 'Last Login Time',
            'last_login_ip' => 'Last Login Ip',
            'login_count' => 'Login Count',
            'verify' => 'Verify',
            'email' => 'Email',
            'remark' => 'Remark',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => '用户状态',
            'type_id' => 'Type ID',
            'info' => 'Info',
            'name' => 'Name',
            'dept_id' => 'Dept ID',
            'user_id' => '账户编号',
            'user_name' => '姓名',
            'password' => 'Password',
            'pwd1' => 'Pwd1',
            'passopen' => 'Passopen',
            'pwd2' => 'Pwd2',
            'passopentwo' => 'Passopentwo',
            'pwd3' => 'Pwd3',
            'nickname' => '昵称',
            'qq' => 'Qq',
            'bank_name' => 'Bank Name',
            'bank_card' => 'Bank Card',
            'bank_province' => 'Bank Province',
            'bank_city' => 'Bank City',
            'bank_address' => 'Bank Address',
            'user_code' => 'User Code',
            'user_address' => 'User Address',
            'user_post' => 'User Post',
            'user_tel' => '注册手机号',
            'user_phone' => 'User Phone',
            'rdt' => 'Rdt',
            'treeplace' => 'Treeplace',
            'father_id' => 'Father ID',
            'father_name' => 'Father Name',
            're_id' => 'Re ID',
            're_name' => 'Re Name',
            'is_pay' => 'Is Pay',
            'is_null' => 'Is Null',
            'is_lock' => '是否锁定',
            'is_lock_ok' => 'Is Lock Ok',
            'shoplx' => 'Shoplx',
            'shop_a' => 'Shop A',
            'shop_b' => 'Shop B',
            'is_agent' => '是否受理中心',
            'agent_max' => 'Agent Max',
            'agent_use' => '动态钱包',
            'agent_cash' => '静态钱包',
            'agent_kt' => 'Agent Kt',
            'agent_xf' => 'Agent Xf',
            'agent_cf' => 'Agent Cf',
            'agent_gp' => 'Agent Gp',
            'agent_gw' => 'Agent Gw',
            'gp_num' => 'Gp Num',
            'agent_lock' => 'Agent Lock',
            'live_gupiao' => 'Live Gupiao',
            'all_in_gupiao' => 'All In Gupiao',
            'all_out_gupiao' => 'All Out Gupiao',
            'p_out_gupiao' => 'P Out Gupiao',
            'no_out_gupiao' => 'No Out Gupiao',
            'ok_out_gupiao' => 'Ok Out Gupiao',
            'yuan_gupiao' => 'Yuan Gupiao',
            'all_gupiao' => 'All Gupiao',
            'tx_num' => 'Tx Num',
            'lssq' => 'Lssq',
            'zsq' => 'Zsq',
            'adt' => 'Adt',
            'l' => 'L',
            'r' => 'R',
            'benqi_l' => 'Benqi L',
            'benqi_r' => 'Benqi R',
            'shangqi_l' => 'Shangqi L',
            'shangqi_r' => 'Shangqi R',
            'peng_num' => 'Peng Num',
            'num_l' => 'Num L',
            'num_r' => 'Num R',
            'num_lr' => 'Num Lr',
            'u_level' => 'U Level',
            'y_level' => 'Y Level',
            'is_boss' => 'Is Boss',
            'idt' => 'Idt',
            'pdt' => '注册时间',
            're_level' => 'Re Level',
            'p_level' => 'P Level',
            're_path' => 'Re Path',
            'p_path' => 'P Path',
            'tp_path' => 'Tp Path',
            'is_del' => 'Is Del',
            'shop_id' => 'Shop ID',
            'shop_name' => 'Shop Name',
            'shop_uname' => 'Shop Uname',
            'b0' => 'B0',
            'b1' => 'B1',
            'b2' => 'B2',
            'b3' => 'B3',
            'b4' => 'B4',
            'b5' => 'B5',
            'b6' => 'B6',
            'b7' => 'B7',
            'b8' => 'B8',
            'b9' => 'B9',
            'b12' => 'B12',
            'b11' => 'B11',
            'b10' => 'B10',
            'wlf' => 'Wlf',
            'wlf_money' => 'Wlf Money',
            'cpzj' => 'Cpzj',
            'y_cpzj' => 'Y Cpzj',
            'zjj' => 'Zjj',
            're_money' => 'Re Money',
            'cz_epoint' => 'Cz Epoint',
            'lr' => 'Lr',
            'shangqi_lr' => 'Shangqi Lr',
            'benqi_lr' => 'Benqi Lr',
            'user_type' => 'User Type',
            're_peat_money' => 'Re Peat Money',
            're_nums' => 'Re Nums',
            're_nums_b' => 'Re Nums B',
            're_nums_l' => 'Re Nums L',
            're_nums_r' => 'Re Nums R',
            'duipeng' => 'Duipeng',
            '_times' => 'Times',
            'fanli' => 'Fanli',
            'fanli_time' => 'Fanli Time',
            'fanli_num' => 'Fanli Num',
            'fanli_money' => 'Fanli Money',
            'is_fenh' => 'Is Fenh',
            'open' => 'Open',
            'singular' => 'Singular',
            'new_agent' => 'New Agent',
            'day_feng' => 'Day Feng',
            'get_date' => 'Get Date',
            'get_numb' => 'Get Numb',
            'is_jb' => 'Is Jb',
            'sq_jb' => 'Sq Jb',
            'jb_sdate' => 'Jb Sdate',
            'jb_idate' => 'Jb Idate',
            'man_ceng' => 'Man Ceng',
            'prem' => 'Prem',
            'wang_j' => 'Wang J',
            'wang_t' => 'Wang T',
            'get_level' => 'Get Level',
            'is_xf' => 'Is Xf',
            'xf_money' => 'Xf Money',
            'is_zy' => 'Is Zy',
            'zyi_date' => 'Zyi Date',
            'zyq_date' => 'Zyq Date',
            'mon_get' => 'Mon Get',
            'xy_money' => 'Xy Money',
            'xx_money' => 'Xx Money',
            'down_num' => 'Down Num',
            'u_pai' => 'U Pai',
            'n_pai' => 'N Pai',
            'ok_pay' => 'Ok Pay',
            'wenti' => 'Wenti',
            'wenti_dan' => 'Wenti Dan',
            'is_tj' => 'Is Tj',
            're_f4' => 'Re F4',
            'is_aa' => 'Is Aa',
            'is_bb' => 'Is Bb',
            'us_img' => 'Us Img',
            'x_pai' => 'X Pai',
            'x_out' => 'X Out',
            'x_num' => 'X Num',
            'is_lockqd' => 'Is Lockqd',
            'is_lockfh' => 'Is Lockfh',
            'seller_rate' => 'Seller Rate',
            'g_level_a' => 'G Level A',
            'g_level_b' => 'G Level B',
            're_cpzj' => 'Re Cpzj',
            'pro_id' => 'Pro ID',
            'gdt' => 'Gdt',
            'end_time' => 'End Time',
            'xiaofei_money' => 'Xiaofei Money',
            'gp_divi_count' => 'Gp Divi Count',
            'b_apply_agent' => 'B Apply Agent',
            'quyu' => 'Quyu',
            'chat' => 'Chat',
            'zhifuPay' => 'Zhifu Pay',
            'weixinWalet' => 'Weixin Walet',
            'caifuPay' => 'Caifu Pay',
            'jingli' => 'Jingli',
            'zongjian' => 'Zongjian',
            'dongshi' => 'Dongshi',
            'ca_numb' => 'Ca Numb',
            'h4' => 'H4',
            'h5' => 'H5',
            'h6' => 'H6',
            'oldjing' => 'Oldjing',
            'olddong' => 'Olddong',
            'h7' => 'H7',
        ];
    }
}
