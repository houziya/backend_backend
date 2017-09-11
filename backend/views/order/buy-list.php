<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\ZyrjCash;

$this->title = '入场订单列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'x1',
            [
                'attribute' =>'rdt',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return date("Y-m-d H:i:s", $model->rdt);
                }
            ],
            'b_user_id',
            'money',
            [
                'attribute' =>'is_pay',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    if($model->is_pay == 0){
                        return "待匹配";
                    }else{
                        return "已匹配成功";
                    }
                }
            ],
            [
                'attribute' =>'是否超时',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model, $s12){
                    if($model->is_pay == 1){
                        $ok = time() - $model->rdt - $s12 * 60 * 60;
                        if($ok > 0 && ($model->is_done == 0)){
                            return "已超时";
                        }
                        return "未超时或已付款";
                    }else{
                        return "未匹配";
                    }
                }
            ],
            [
                'attribute' =>'is_cancel',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return \common\models\ZyrjCash::$isCancelText[$model->is_cancel];
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => ' {delete}{buy-view} {update}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'cancellevel'),
                            'aria-label' => Yii::t('yii', 'cancellevel'),
                            'class' => 'btn btn-default btn-xs',
                            'data' => ['confirm' => '你确定要删除吗？'],
                            //'data-pjax' => '0',
                        ];
                        return Html::a('删除订单', $url, $options);
                    },
                    'buy-view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'cancellevel'),
                            'aria-label' => Yii::t('yii', 'cancellevel'),
                            'class' => 'btn btn-default btn-xs',
                            //'data' => ['confirm' => '你确定要删除吗？'],
                            //'data-pjax' => '0',
                        ];
                        return Html::a('查看详情', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
