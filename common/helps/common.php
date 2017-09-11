<?php
/**
 * Created by PhpStorm.
 * User: Ydz
 * Date: 2017/8/1
 * Time: 20:10
 */
namespace common\helps;

use common\models\ZyrjCash;
use common\models\ZyrjPhoneSms;
use Yii;

class common{
    public static function __getNewOrderNumber($pre = "S"){
        $cashModel = new ZyrjCash();
        $newOrderNumber = $pre . rand(10000000, 99999999);
        $orderNubmer = $cashModel->find()->where(['x1' => $newOrderNumber])->one();
        if ($orderNubmer) {
            return self::__getNewOrderNumber();
        } else {
            unset($cashModel, $orderNubmer);
            return $newOrderNumber;
        }
    }

    public static function send_sms_new($contents, $phone)
    {
        return;
        $contents = $contents . '' . "【" . Yii::$app->params['sms']['smsSign'] . "】";
        $url = "http://115.28.172.169:8888/sms.aspx?action=send&userid=51&account=JACK&password=JAck1234&mobile=" . $phone . "&content=" . $contents . "&sendTime=&extno=";
        $resSend = self::helperCurl($url);
        $xmlSendRes = simplexml_load_string($resSend);
        $sendStatus = (string)$xmlSendRes->returnstatus;
        $sendMessage = (string)$xmlSendRes->message;
        $sendId = (int)$xmlSendRes->taskID;
        $data = [];
        $data['phone'] = $phone;
        $data['send_content'] = $contents;
        $data['ip'] = self::get_real_ip();
        $data['create_time'] = time();
        $data['send_result'] = json_encode(["status" => $sendStatus, "message" => $sendMessage, "task_id" => $sendId]);
        $phoneSmsModel = new ZyrjPhoneSms();
        $phoneSmsModel->isNewRecord = true;
        $phoneSmsModel->setAttributes($data);
        $phoneSmsModel->save() && $phoneSmsModel->id=0;
        return $resSend;
    }

    //curl请求
    public static function  helperCurl($url){
        //初始化
        $ch = curl_init();
        //设置选项，包括URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        return $output;
    }

    public static function get_real_ip(){
        $unknown = 'unknown';
        if ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown) ) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif ( isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown) ) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if (false !== strpos($ip, ','))
            $ip = reset(explode(',', $ip));
        return $ip;
    }
}
?>