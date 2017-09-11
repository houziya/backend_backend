<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm; // or yii\widgets\ActiveForm
use yii\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = $model->x1;
$this->params['breadcrumbs'][] = ['label' => '详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode("订单编号:" . $this->title) ?></h1>

    <!--<p>
        <?/*= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除吗?',
                'method' => 'post',
            ],
        ]) */?>
    </p>-->
    <p>
        <strong>你必须在<font id="expire_date"><?php $a = $model->pdt+2*24*60*60; echo date("Y-m-d H:i:s",$a); ?></font>之前根据银行提供进一步的细节：</strong>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'x1',
            'money',
            'rdt',
            ['label'=>'收款人银行','value'=>$memberModel->bank_name],
            ['label'=>'收款人姓名','value'=>$memberModel->user_name],
            ['label'=>'收款人账户号码','value'=>$memberModel->bank_card],
            ['label'=>'收款人QQ','value'=>$memberModel->qq],
            ['label'=>'收款人微信号','value'=>$memberModel->chat],
            ['label'=>'收款人微信钱包','value'=>$memberModel->weixinWalet],
            ['label'=>'收款人支付宝','value'=>$memberModel->zhifuPay],
            ['label'=>'收款人财付通','value'=>$memberModel->caifuPay],
            ['label'=>'收款人电话','value'=>$memberModel->user_tel],
            ['label'=>'收款金额','value'=>$matchModel->money],
            ['label'=>'推荐人电话','value'=>$memberModel->re_id],
            ['label'=>'是否已确认收款','value'=>($matchModel->is_done == 1) ? "已确认收款" : "未确认收款"],
            ['label'=>'查看凭证','value'=>$model->img ? Html::a("查看凭证", Yii::$app->params['oss']['domainHost'] . $model->img) : "未上传", 'format' => 'raw'],
        ],
    ]) ?>
    <?php $form = ActiveForm::begin(['action' => ['order/upload'],'method'=>'post','options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'img')->fileInput() ?>
    <?= Html::hiddenInput("id", $model->id); ?>
    <?= Html::submitButton($model->isNewRecord ? '保存' : '上传图片', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

    <?php ActiveForm::end() ?>
    <p>汇款前请先电话或者短信通知打款人</p>

    <p>---------------------</p>


    <p>在收到资金之前不要确认支付，因为确认了就不能撤销了，系统会默认你已经收到钱了！</p>

    <p><font color="#FF0000">注意！</font></p>

    <p>1)转账汇款不要提及到关于亿联互助的支付目的，使用非标准的方式来表达即可！</p>

    <p>2)万一订单没有完成，你的账号将被封锁。你匹配的订单将给（转移）另一个参与者。</p>
</div>
