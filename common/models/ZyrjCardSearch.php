<?php

namespace common\models;
use yii\data\ActiveDataProvider;
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
class ZyrjCardSearch extends \yii\db\ActiveRecord
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
            [['bid'], 'integer'],
            [['buser_id', 'card_no', 'card_pw', 'money', 'bz'], 'safe'],
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
            'bid' => 'Bid',
            'buser_id' => 'Buser ID',
            'card_no' => 'Card No',
            'card_pw' => 'Card Pw',
            'c_time' => 'C Time',
            'f_time' => 'F Time',
            'l_time' => 'L Time',
            'b_time' => 'B Time',
            'is_sell' => 'Is Sell',
            'is_use' => 'Is Use',
            'money' => 'Money',
            'c_type' => 'C Type',
            'bz' => 'Bz',
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
        $query = ZyrjCard::find();

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
            'card_no' => $this->card_no,
            'buser_id' => $this->buser_id,
            'bid' => $this->bid
        ]);

        $query->andFilterWhere(['like', 'card_no', $this->card_no]);
        return $dataProvider;
    }
}
