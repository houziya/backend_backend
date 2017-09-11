<?php

namespace backend\controllers;

use common\helps\Execution;
use common\models\ZyrjCard;
use common\models\ZyrjCash;
use common\models\ZyrjCashSearch;
use common\models\ZyrjFck;
use common\models\ZyrjFee;
use common\helps\common;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;
use Yii;
use yii\base\ErrorException;
use yii\web\UploadedFile;

class OrderController extends \yii\web\Controller
{
    public function actionBuyList()
    {
        $searchModel = new ZyrjCashSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $configParams = ZyrjFee::findOne(["id"=>1]);
        return $this->render('buy-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            's12' => $configParams["s12"],
        ]);
    }

    public function actionSellList()
    {
        $searchModel = new ZyrjCashSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 1);

        $configParams = ZyrjFee::findOne(["id"=>1]);
        return $this->render('sell-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            's12' => $configParams["s12"],
        ]);
    }

    public function actionDelete()
    {
        $orderId = intval(Yii::$app->request->get("id"));
        $orderInfo = ZyrjCash::findOne(["id" => $orderId, "is_done" => 0]);
        if ((time() - $orderInfo["rdt"]) >= 24 * 3600) {
            return $this->redirect("buy-list");
        }
        if ($orderInfo['money_type'] == 2) {
            //减少挂卖金额
            $memberModel = ZyrjFck::findOne($orderInfo['uid']);
            $memberModel->xx_money -= $orderInfo['money'];
            $memberModel->save(false);
        }
        ZyrjCash::deleteAll(["id"=>$orderId]);
        $this->redirect("buy-list");
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('sell-view', [
            'model' => $model,
            'memberModel' => $this->findMemberModel($model->uid, false),
            'matchModel' => $this->findModel($model->match_id)
        ]);
    }

    public function actionBuyView($id)
    {
        $model = $this->findModel($id, false);
        return $this->render('buy-view', [
            'model' => $model,
            'memberModel' => $this->findMemberModel($model->sid, false),
            'matchModel' => $this->findModel($model->match_id, false)
        ]);
    }

    public function actionMatchs()
    {
        $buyOrders = Yii::$app->request->post("buy_order");
        $sellOrders = Yii::$app->request->post("sell_order");
        Execution::autoTransaction(Yii::$app->db2, function() use($buyOrders, $sellOrders){
            $this->authMatch($buyOrders, $sellOrders);
        });

        return $this->render('matchs', [
            "buy_order" => $buyOrders,
            "sell_order" => $sellOrders
        ]);
    }

    protected function authMatch($buyOrders, $sellOrders){
        if(empty($buyOrders) || empty($sellOrders)){
            Yii::$app->getSession()->setFlash('error', '请输入进场和出场单号!!!');
            return;
        }

        $buyWhere = [
            "x1"=>explode(",", $buyOrders),
            "match_num"=> 0,
            "is_pay"=> 0,
            "is_cancel"=> 0,
            "is_done"=> 0,
            "type"=> 0
        ];
        $buyOrdersList = array_map(function($record) {
            return $record->attributes;
        }, (array)(ZyrjCash::findAll($buyWhere)));
        $sellWhere = [
            "x1"=>explode(",", $sellOrders),
            "is_pay"=> 0,
            "is_cancel"=> 0,
            "is_done"=> 0,
            "type"=> 1
        ];
        $sellOrdersList = array_map(function($record) {
            return $record->attributes;
        }, (array)(ZyrjCash::findAll($sellWhere)));
        if(empty($buyOrdersList)){
            Yii::$app->getSession()->setFlash('error', '找不到进场有效订单');
            return;
        }
        if(empty($sellOrdersList)){
            Yii::$app->getSession()->setFlash('error', '找不到出场有效订单');
            return;
        }
        $matchRes = [];
        foreach ($buyOrdersList as $key => $bbb) {
            $abs = array();
            foreach ($sellOrdersList as $skey => $sss) {
                $dist = $bbb['money'] - $sss['money'];
                $abs[$skey] = abs($dist);
            }
            if(empty($sellOrdersList)){
                continue;
            }
            $pos = array_search(min($abs), $abs);
            $matchRes[] = $this->matchs($bbb['x1'], $sellOrdersList[$pos]['x1']);
            unset($buyOrdersList[$key]);
            unset($sellOrdersList[$pos]);
        }
        if ($matchRes) {
            $inOrderList = [];
            $outOrderList = [];
            foreach($matchRes as $match){
                if($match["order_type"] == 0){
                    $inOrderList[] = $match["order"];
                }
                if($match["order_type"] == 1){
                    $outOrderList[] = $match["order"];
                }
            }
            //$inOrderList = array_merge($inOrderList, $cash_brs);
            //$outOrderList = array_merge($outOrderList, $cash_srs);
            if(array_column($buyOrdersList, "x1")){
                $inOrderList = array_merge($inOrderList, array_column($buyOrdersList, "x1"));
            }else{
                $inOrderList = $inOrderList;
            }
            if(array_column($sellOrdersList, "x1")){
                $outOrderList = array_merge($outOrderList, array_column($sellOrdersList, "x1"));
            }else{
                $outOrderList = $outOrderList;
            }
            if(empty($inOrderList) && empty($outOrderList)){
                Yii::$app->getSession()->setFlash('success', '拆分完成');
                return;
            }
            $this->authMatch(implode(",", $inOrderList), implode(",", $outOrderList));
        }
    }

    //手动快速匹配NEWNEWNEW
    private function matchs($in = '', $out = '')
    {
        $inCode = $in;
        $outCode = $out;
        $zm = 0;
        $in_rs = ZyrjCash::findOne(["type"=>0, "is_pay"=>0, "is_cancel"=>0, "x1"=>$inCode]);
        $out_rs = ZyrjCash::findOne(["type"=>1, "is_pay"=>0, "is_cancel"=>0, "x1"=>$outCode]);
        if (empty($out_rs)) {
            Yii::$app->getSession()->setFlash('error', '该出场订单已匹配或不存在!!!');
            return;
        }
        if (empty($in_rs)) {
            Yii::$app->getSession()->setFlash('error', '该进场订单已匹配或不存在!!!');
            return;
        }
        if ($in_rs['uid'] == $out_rs['uid']) {
            Yii::$app->getSession()->setFlash('error', '该进场订单与出场订单所属人一致!!!');
            return;
        }
        $zm = $zm + $out_rs['money'];

        $yiid = $out_rs['uid'];
        $syiid = $out_rs['s_user_id'];
        $myiid = $out_rs['id'];
        $loc = ZyrjFck::find()->where(["id" =>$out_rs['uid'], "is_lock"=>1])->select("is_lock")->one();
        if ($loc) {
            Yii::$app->getSession()->setFlash('error', "[" . $out_rs['uid'] . ']用户已锁定!!!');
            return;
        }
        $num = 1;
        if ($in_rs['money'] != $zm) {
            //	$this->error("金额不匹配，请重新选择！");
            //	exit;
        }

        if ($in_rs['money'] == 0 || $out_rs['money'] == 0) {
            Yii::$app->getSession()->setFlash('error',  '金额不能为空');
            return;
        }

        $nowtime = time();
        if (round($in_rs['money']) == round($zm)) {
            $resuelt = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "sid"=>$yiid, "s_user_id"=>$syiid, "match_id"=>$myiid, "match_num"=>$num], ["id"=>$in_rs['id']]);
            $resuelt2 = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "bid"=>$in_rs['uid'], "b_user_id"=>$in_rs['b_user_id'], "match_id"=>$in_rs['id']], ["id"=>$out_rs['id']]);
            $orderType = 2;
            $order = "";

            $tel = ZyrjFck::find()->where(["user_id" =>$out_rs['user_id'], "is_lock"=>0])->select("user_tel")->one();
            $contentOut = '您好，您的订单[' . $out_rs['x1'] . ']匹配成功,请及时登录查看并处理';
            common::send_sms_new($contentOut, $tel["user_tel"]);

            $tel = ZyrjFck::find()->where(["user_id" =>$in_rs['user_id'], "is_lock"=>0])->select("user_tel")->one();
            $contentIn = '您好，您的订单[' . $in_rs['x1'] . ']匹配成功,请及时登录查看并处理';
            common::send_sms_new($contentIn, $tel["user_tel"]);
        }

        if ($in_rs['money'] > $zm) {
            $resuelt = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "sid"=>$yiid, "s_user_id"=>$syiid, "match_id"=>$myiid, "match_num"=>$num], ["id"=>$in_rs['id']]);
            $resuelt2 = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "bid"=>$in_rs['uid'], "b_user_id"=>$in_rs['b_user_id'], "match_id"=>$in_rs['id']], ["id"=>$out_rs['id']]);

            $orderType = 0;
            $order = $this->createbuy($in_rs['uid'], $in_rs['money'] - $zm, $in_rs['x1']);
            $tel = ZyrjFck::find()->where(["user_id" =>$out_rs['user_id'], "is_lock"=>0])->select("user_tel")->one();
            $contentOut = '您好，您的订单[' . $out_rs['x1'] . ']匹配成功,请及时登录查看并处理';
            common::send_sms_new($contentOut, $tel["user_tel"]);
        }

        if ($in_rs['money'] < $zm) {
            $resuelt = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "sid"=>$yiid, "s_user_id"=>$syiid, "match_id"=>$myiid, "match_num"=>$num], ["id"=>$in_rs['id']]);
            $resuelt2 = ZyrjCash::updateAll(["is_pay"=>1, "pdt"=>$nowtime, "bid"=>$in_rs['uid'], "b_user_id"=>$in_rs['b_user_id'], "money"=>$in_rs['money'], "match_id"=>$in_rs['id']], ["id"=>$out_rs['id']]);

            $orderType = 1;
            $order = $this->createsell($out_rs['uid'], $zm - $in_rs['money'], $out_rs['money_type'], $out_rs['x1']);
            $tel = ZyrjFck::find()->where(["user_id" =>$in_rs['user_id'], "is_lock"=>0])->select("user_tel")->one();
            $contentIn = '您好，您的订单[' . $in_rs['x1'] . ']匹配成功,请及时登录查看并处理';
            common::send_sms_new($contentIn, $tel["user_tel"]);
        }
        if ($in_rs && $out_rs) {
            return ["order_type"=>$orderType, "order"=>$order];
        }
    }

    public function createbuy($id = 0, $money = 0, $orderid = '')
    {
        $fck_rs = ZyrjFck::find()->where(["id"=>$id])->one();
        $nowtime = time();

        $code_num = common::__getNewOrderNumber("S");//编号

        unset($data);
        //插入交易表，生成抢单对应买方记录
        $data = array();
        $data['uid'] = $fck_rs['id'];
        $data['user_id'] = $fck_rs['user_id'];
        $data['bid'] = $fck_rs['id'];
        $data['b_user_id'] = $fck_rs['user_id'];
        $data['rdt'] = $nowtime;        //求购时间 重要
        $data['money'] = $money;
        $data['money_two'] = $money;
        $data['epoint'] = 0;            //存储国家，查询币值
        $data['is_pay'] = 0;            //是否匹配成功
        $data['is_cancel'] = 0;            //是否已取消
        $data['is_done'] = 0;            //是否已确认完成交易
        $data['bank_name'] = $fck_rs['bank_name'];  //银行名称
        $data['bank_card'] = $fck_rs['bank_card'];  //银行卡
        $data['user_name'] = $fck_rs['user_name'];  //开户名称
        // $data['sellbz']			= $bzcontent;  	//备注
        $data['s_type'] = '0,1,2,3';        //支付类型
        $data['type'] = 0;                //0为求购，1为挂卖
        $data['money_type'] = 0;                //0为求购，1为mavro挂卖,2为动态余额的挂卖
        $data['ldt'] = $nowtime;
        $data['money_key'] = 0;
        //$data['sellbz']=$fff['id'];
        $data['bz'] = $orderid;
        //	$data['own']='N';
        $data['x1'] = $code_num;                //编号
        //$rs2 = M('cash')->add($data);
        $cashModel = new ZyrjCash();
        $cashModel->setScenario('buy_insert');
        $cashModel->isNewRecord = true;
        $cashModel->setAttributes($data);
        $cashModel->save() && $cashModel->id=0;
        return $code_num;

    }

    public function createsell($id = 0, $money = 0, $money_type = 1, $orderid = '')
    {
        $fck_rs = ZyrjFck::find()->where(["id"=>$id])->one();
        $nowtime = time();
        unset($data);
        //插入交易表，生成抢单对应买方记录
        $data = array();
        $data['uid'] = $fck_rs['id'];
        $data['user_id'] = $fck_rs['user_id'];
        $data['sid'] = $fck_rs['id'];
        $data['s_user_id'] = $fck_rs['user_id'];
        $data['rdt'] = $nowtime;        //求购时间 重要
        $data['money'] = $money;
        $data['money_two'] = $money;
        $data['epoint'] = 0;            //存储国家，查询币值
        $data['is_pay'] = 0;            //是否匹配成功
        $data['is_cancel'] = 0;            //是否已取消
        $data['is_done'] = 0;            //是否已确认完成交易
        $data['bank_name'] = $fck_rs['bank_name'];  //银行名称
        $data['bank_card'] = $fck_rs['bank_card'];  //银行卡
        $data['user_name'] = $fck_rs['user_name'];  //开户名称
        // $data['sellbz']			= $bzcontent;  	//备注
        $data['s_type'] = '0,1,2,3';        //支付类型
        $data['type'] = 1;                //0为求购，1为挂卖
        $data['money_type'] = $money_type;                //0为求购，1为mavro挂卖,2为动态余额的挂卖
        $data['ldt'] = $nowtime;
        $data['money_key'] = 0;
        //$data['sellbz']=$fff['id'];
        $data['bz'] = $orderid;
        //	$data['own']='N';
        $data['x1'] = common::__getNewOrderNumber("G");//编号
        //$rs2 = M('cash')->add($data);
        $cashModel = new ZyrjCash();
        $cashModel->setScenario('sell_insert');
        $cashModel->isNewRecord = true;
        $cashModel->setAttributes($data);
        $cashModel->save() && $cashModel->id=0;
        return $data['x1'];
    }

    public function actionUpload()
    {
        if (Yii::$app->request->isPost) {
            $model = $this->findModel(Yii::$app->request->post("id"));
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->img) {
                $model->img->saveAs("images/" . $model->img->baseName . '.' . $model->img->extension);
                $fileName = Yii::$app->request->post("id") . md5(uniqid()) . "." . $model->img->extension;
                Yii::$app->Aliyunoss->upload("order/" . $fileName, "images/" . $model->img->baseName . '.' . $model->img->extension);
                unlink("images/" . $model->img->baseName . '.' . $model->img->extension);
                $model->img = "order/" . $fileName;
                if($model->save(false)){
                    Yii::$app->getSession()->setFlash('success', '上传成功');
                }
            }
            $this->redirect(["buy-view", "id"=>$model->id]);
        }
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findMemberModel($id, $require = 1)
    {
        if (($model = ZyrjFck::findOne($id)) !== null) {
            return $model;
        } else {
            if($require){
                throw new InvalidArgumentException('The requested page does not exist.');
            }else{
                return [];
            }
        }
    }
    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $require = 1)
    {
        if (($model = ZyrjCash::findOne($id)) !== null) {
            return $model;
        } else {
            if($require){
                throw new InvalidArgumentException('The requested page does not exist.');
            }else{
                return [];
            }
        }
    }
}
