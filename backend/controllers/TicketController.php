<?php

namespace backend\controllers;

use common\models\ZyrjCard;
use common\models\ZyrjCardSearch;
use common\models\ZyrjFck;
use common\models\ZyrjOrderlist;
use yii;

class TicketController extends \yii\web\Controller
{
    public function actionList()
    {
        $searchModel = new ZyrjCardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ZyrjCard();
        if(Yii::$app->request->isPost){
            $user = ZyrjFck::find()->where(['user_id' => Yii::$app->request->post()["ZyrjCard"]["buser_id"]])->one();
            if(empty($user)){
                $this->redirect(['list']);
                return;
            }
            if ($model->load(Yii::$app->request->post())) {
                $count = Yii::$app->request->post()["ZyrjCard"]["count"];
                for ($i = 0; $i < $count; $i++) {
                    $model->isNewRecord = true;
                    $model->bid = 0;
                    $model->c_type = 0;
                    $model->is_use = 0;
                    $model->card_no = $this->buildActiveCode();
                    $model->c_time = time();
                    $model->save(false) && $model->id=0;
                }
                //后台充值增加门票记录，插入orderlist表
                $orderListModel = new ZyrjOrderlist();
                $orderListModel->userid = $user['id'];
                $orderListModel->ordstatus = 12; //后台增加
                $orderListModel->num = $count;
                $orderListModel->payment_notify_time = date("Y-m-d H:i:s");
                $orderListModel->payment_type = '后台充值门票增加';
                $orderListModel->save(false);
                $this->redirect(['list']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function buildActiveCode()
    {
        $baseChar = '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $bit = 8;
        $tStr = '';
        for ($i = 0; $i < $bit; $i++) {
            $rnd = rand(0, strlen($baseChar) - 1);
            $tStr .= $baseChar[$rnd];
        }
        return $tStr;
    }
}
