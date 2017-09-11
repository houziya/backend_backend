<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "zyrj_fee".
 *
 * @property integer $id
 * @property integer $i1
 * @property integer $i2
 * @property integer $i3
 * @property integer $i4
 * @property integer $i5
 * @property integer $i6
 * @property integer $i7
 * @property integer $i8
 * @property integer $i9
 * @property integer $i10
 * @property string $i11
 * @property string $s1
 * @property string $s2
 * @property string $s3
 * @property string $strjingli
 * @property string $strzongjian
 * @property string $strdongshi
 * @property string $s4
 * @property string $s5
 * @property string $s6
 * @property string $s7
 * @property string $s8
 * @property string $s9
 * @property string $s10
 * @property string $s11
 * @property string $s12
 * @property string $s13
 * @property string $s14
 * @property string $s15
 * @property string $s16
 * @property string $s17
 * @property string $s18
 * @property string $s19
 * @property string $s20
 * @property string $str1
 * @property string $str2
 * @property string $str3
 * @property string $str4
 * @property string $str5
 * @property string $str6
 * @property string $str7
 * @property string $str8
 * @property string $str9
 * @property string $str10
 * @property string $str11
 * @property string $str12
 * @property string $str13
 * @property string $str14
 * @property string $str15
 * @property string $str16
 * @property string $str17
 * @property string $str18
 * @property string $str19
 * @property string $str20
 * @property string $str21
 * @property string $str22
 * @property string $str23
 * @property string $str24
 * @property string $str25
 * @property string $str26
 * @property string $str27
 * @property string $str28
 * @property string $str29
 * @property string $str30
 * @property string $str99
 * @property integer $us_num
 * @property integer $create_time
 * @property integer $f_time
 * @property integer $g_time
 * @property string $a_money
 * @property string $b_money
 * @property integer $ff_num
 * @property string $gp_one
 * @property string $gp_open
 * @property string $gp_close
 * @property integer $gp_kg
 * @property integer $gp_cnum
 * @property string $gp_perc
 * @property string $gp_inm
 * @property string $gp_cgbl
 * @property integer $gp_fxnum
 * @property integer $gp_senum
 * @property integer $ys_kg
 * @property integer $ys_num
 * @property integer $gd_time
 * @property string $str31
 * @property string $str32
 * @property string $gp_sell_count
 * @property string $str33
 * @property string $str34
 * @property string $str35
 * @property string $str36
 * @property string $str37
 * @property string $str38
 * @property string $str39
 * @property string $str40
 * @property string $last_gp_count
 * @property string $bobo_h4
 * @property string $bobo_h5
 * @property string $bobo_h6
 * @property integer $bobo_buylimit
 * @property integer $bobo_bdlimit
 * @property integer $str45
 * @property integer $str46
 * @property integer $str47
 * @property string $str48
 * @property string $str49
 * @property integer $i30
 * @property integer $i31
 * @property integer $i32
 * @property integer $i33
 * @property integer $i34
 * @property integer $i35
 * @property integer $i36
 * @property integer $i37
 * @property integer $i38
 * @property integer $i39
 * @property integer $i40
 * @property string $i21
 * @property integer $i22
 * @property integer $i23
 * @property integer $i24
 * @property integer $i25
 * @property integer $i26
 * @property integer $i27
 * @property integer $i28
 * @property integer $i29
 * @property integer $i41
 * @property integer $i42
 * @property integer $i43
 * @property integer $i44
 * @property integer $i45
 * @property integer $i46
 * @property integer $i47
 * @property integer $i48
 * @property integer $i49
 * @property integer $i50
 * @property integer $s21
 * @property integer $s22
 * @property integer $s23
 * @property integer $s24
 * @property integer $s25
 * @property integer $s26
 * @property integer $s27
 * @property integer $s28
 * @property integer $s29
 * @property integer $s30
 * @property integer $s31
 * @property integer $s32
 * @property integer $s33
 * @property integer $s34
 * @property integer $s35
 * @property integer $s50
 * @property integer $s36
 * @property integer $s37
 * @property integer $s38
 * @property integer $s39
 * @property integer $s40
 * @property integer $s41
 * @property integer $s42
 * @property integer $s43
 * @property integer $s44
 * @property integer $s45
 * @property string $s46
 * @property string $s47
 * @property string $s48
 * @property string $s49
 */
class ZyrjFee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zyrj_fee';
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
            [['i1', 'i2', 'i3', 'i4', 'i5', 'i6', 'i7', 'i8', 'i9', 'i10', 'i11', 'us_num', 'create_time', 'f_time', 'g_time', 'ff_num', 'gp_kg', 'gp_cnum', 'gp_fxnum', 'gp_senum', 'ys_kg', 'ys_num', 'gd_time', 'gp_sell_count', 'last_gp_count', 'bobo_buylimit', 'bobo_bdlimit', 'str45', 'str46', 'str47', 'i30', 'i31', 'i32', 'i33', 'i34', 'i35', 'i36', 'i37', 'i38', 'i39', 'i40', 'i22', 'i23', 'i24', 'i25', 'i26', 'i27', 'i28', 'i29', 'i41', 'i42', 'i43', 'i44', 'i45', 'i46', 'i47', 'i48', 'i49', 'i50', 's21', 's22', 's23', 's24', 's25', 's26', 's27', 's28', 's29', 's30', 's31', 's32', 's33', 's34', 's35', 's50', 's36', 's37', 's38', 's39', 's40', 's41', 's42', 's43', 's44', 's45'], 'integer'],
            [['str99', 'gp_perc', 'gp_inm', 'gp_cgbl', 'gd_time', 'str31', 'str32', 'bobo_h4', 'bobo_h5', 'bobo_h6', 'bobo_buylimit', 'bobo_bdlimit', 'str45', 'str46', 'str47', 'str48', 'str49', 'i30', 'i31', 'i32', 'i33', 'i34', 'i35', 'i36', 'i37', 'i38', 'i39', 'i40', 'i21', 'i22', 'i23', 'i24', 'i25', 'i26', 'i27', 'i28', 'i29', 'i41', 'i42', 'i43', 'i44', 'i45', 'i46', 'i47', 'i48', 'i49', 'i50', 's21', 's22', 's23', 's24', 's25', 's26', 's27', 's28', 's29', 's30', 's31', 's32', 's33', 's34', 's35', 's50', 's36', 's37', 's38', 's39', 's40', 's41', 's42', 's43', 's44', 's45', 's46', 's47', 's48', 's49'], 'required'],
            [['str99'], 'string'],
            [['a_money', 'b_money', 'gp_one', 'gp_open', 'gp_close'], 'number'],
            [['s1', 's2', 's3', 'strjingli', 'strzongjian', 'strdongshi', 's4', 's5', 's6', 's7', 's8', 's9', 's10', 's11', 's12', 's13', 's14', 's15', 's16', 's17', 's18', 's19', 's20', 'str1', 'str2', 'str3', 'str4', 'str5', 'str6', 'str7', 'str8', 'str9', 'str10', 'str11', 'str12', 'str13', 'str14', 'str15', 'str16', 'str17', 'str18', 'str19', 'str20', 'str21', 'str22', 'str23', 'str24', 'str25', 'str26', 'str27', 'str28', 'str29', 'str30', 'str31', 'str32'], 'string', 'max' => 200],
            [['gp_perc', 'gp_inm', 'gp_cgbl'], 'string', 'max' => 50],
            [['str33', 'str34', 'str35', 'str36', 'str37', 'str38', 'str39', 'str40', 'bobo_h4', 'bobo_h5', 'bobo_h6', 'str48', 'str49', 'i21'], 'string', 'max' => 250],
            [['s46', 's47', 's48', 's49'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'i1' => 'I1',
            'i2' => 'I2',
            'i3' => 'I3',
            'i4' => 'I4',
            'i5' => 'I5',
            'i6' => 'I6',
            'i7' => 'I7',
            'i8' => 'I8',
            'i9' => 'I9',
            'i10' => 'I10',
            'i11' => 'I11',
            's1' => 'S1',
            's2' => 'S2',
            's3' => 'S3',
            'strjingli' => 'Strjingli',
            'strzongjian' => 'Strzongjian',
            'strdongshi' => 'Strdongshi',
            's4' => 'S4',
            's5' => 'S5',
            's6' => 'S6',
            's7' => 'S7',
            's8' => 'S8',
            's9' => 'S9',
            's10' => 'S10',
            's11' => 'S11',
            's12' => 'S12',
            's13' => 'S13',
            's14' => 'S14',
            's15' => 'S15',
            's16' => 'S16',
            's17' => 'S17',
            's18' => 'S18',
            's19' => 'S19',
            's20' => 'S20',
            'str1' => 'Str1',
            'str2' => 'Str2',
            'str3' => 'Str3',
            'str4' => 'Str4',
            'str5' => 'Str5',
            'str6' => 'Str6',
            'str7' => 'Str7',
            'str8' => 'Str8',
            'str9' => 'Str9',
            'str10' => 'Str10',
            'str11' => 'Str11',
            'str12' => 'Str12',
            'str13' => 'Str13',
            'str14' => 'Str14',
            'str15' => 'Str15',
            'str16' => 'Str16',
            'str17' => 'Str17',
            'str18' => 'Str18',
            'str19' => 'Str19',
            'str20' => 'Str20',
            'str21' => 'Str21',
            'str22' => 'Str22',
            'str23' => 'Str23',
            'str24' => 'Str24',
            'str25' => 'Str25',
            'str26' => 'Str26',
            'str27' => 'Str27',
            'str28' => 'Str28',
            'str29' => 'Str29',
            'str30' => 'Str30',
            'str99' => 'Str99',
            'us_num' => 'Us Num',
            'create_time' => 'Create Time',
            'f_time' => 'F Time',
            'g_time' => 'G Time',
            'a_money' => 'A Money',
            'b_money' => 'B Money',
            'ff_num' => 'Ff Num',
            'gp_one' => 'Gp One',
            'gp_open' => 'Gp Open',
            'gp_close' => 'Gp Close',
            'gp_kg' => 'Gp Kg',
            'gp_cnum' => 'Gp Cnum',
            'gp_perc' => 'Gp Perc',
            'gp_inm' => 'Gp Inm',
            'gp_cgbl' => 'Gp Cgbl',
            'gp_fxnum' => 'Gp Fxnum',
            'gp_senum' => 'Gp Senum',
            'ys_kg' => 'Ys Kg',
            'ys_num' => 'Ys Num',
            'gd_time' => 'Gd Time',
            'str31' => 'Str31',
            'str32' => 'Str32',
            'gp_sell_count' => 'Gp Sell Count',
            'str33' => 'Str33',
            'str34' => 'Str34',
            'str35' => 'Str35',
            'str36' => 'Str36',
            'str37' => 'Str37',
            'str38' => 'Str38',
            'str39' => 'Str39',
            'str40' => 'Str40',
            'last_gp_count' => 'Last Gp Count',
            'bobo_h4' => 'Bobo H4',
            'bobo_h5' => 'Bobo H5',
            'bobo_h6' => 'Bobo H6',
            'bobo_buylimit' => 'Bobo Buylimit',
            'bobo_bdlimit' => 'Bobo Bdlimit',
            'str45' => 'Str45',
            'str46' => 'Str46',
            'str47' => 'Str47',
            'str48' => 'Str48',
            'str49' => 'Str49',
            'i30' => 'I30',
            'i31' => 'I31',
            'i32' => 'I32',
            'i33' => 'I33',
            'i34' => 'I34',
            'i35' => 'I35',
            'i36' => 'I36',
            'i37' => 'I37',
            'i38' => 'I38',
            'i39' => 'I39',
            'i40' => 'I40',
            'i21' => 'I21',
            'i22' => 'I22',
            'i23' => 'I23',
            'i24' => 'I24',
            'i25' => 'I25',
            'i26' => 'I26',
            'i27' => 'I27',
            'i28' => 'I28',
            'i29' => 'I29',
            'i41' => 'I41',
            'i42' => 'I42',
            'i43' => 'I43',
            'i44' => 'I44',
            'i45' => 'I45',
            'i46' => 'I46',
            'i47' => 'I47',
            'i48' => 'I48',
            'i49' => 'I49',
            'i50' => 'I50',
            's21' => 'S21',
            's22' => 'S22',
            's23' => 'S23',
            's24' => 'S24',
            's25' => 'S25',
            's26' => 'S26',
            's27' => 'S27',
            's28' => 'S28',
            's29' => 'S29',
            's30' => 'S30',
            's31' => 'S31',
            's32' => 'S32',
            's33' => 'S33',
            's34' => 'S34',
            's35' => 'S35',
            's50' => 'S50',
            's36' => 'S36',
            's37' => 'S37',
            's38' => 'S38',
            's39' => 'S39',
            's40' => 'S40',
            's41' => 'S41',
            's42' => 'S42',
            's43' => 'S43',
            's44' => 'S44',
            's45' => 'S45',
            's46' => 'S46',
            's47' => 'S47',
            's48' => 'S48',
            's49' => 'S49',
        ];
    }
}
