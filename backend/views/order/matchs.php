<?php

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */

$this->title = '匹配订单';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">
    <?php
    if( Yii::$app->getSession()->hasFlash('success') ) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-success', //这里是提示框的class
            ],
            'body' => Yii::$app->getSession()->getFlash('success'), //消息体
        ]);
    }
    if( Yii::$app->getSession()->hasFlash('error') ) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-danger',
            ],
            'body' => Yii::$app->getSession()->getFlash('error'),
        ]);
    }
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="site-signup">
        <div class="row">
            <div class="col-lg-9">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <div class="form-group required">
                    <label class="control-label">进场订单:</label>
                    <?=Html::textarea('buy_order', $buy_order,['class'=>'form-control required','rows'=>'5']);?>
                </div>

                <div class="form-group required">
                    <label class="control-label">出场订单:</label>
                    <?=Html::textarea('sell_order', $sell_order,['class'=>'form-control required','rows'=>'5']);?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('开始匹配', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
