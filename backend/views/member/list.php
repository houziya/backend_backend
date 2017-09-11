<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ZyrjFck;

$this->title = '会员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'user_id',
            'nickname',
            'user_name',
            'user_tel',
            [
                'attribute' =>'status',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return $model->status;
                }
            ],
            [
                'attribute' =>'pdt',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return date("Y-m-d H:i:s", $model->pdt);
                }
            ],
            'agent_cash',
            'agent_use',
            [
                'attribute' =>'is_lock',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return \common\models\ZyrjFck::$memberIsLockText[$model->is_lock];
                }
            ],
            [
                'attribute' =>'is_agent',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return \common\models\ZyrjFck::$memberIsAgentText[$model->is_agent];
                }
            ],
            [
                'attribute' =>'级别',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    if($model->jingli == 1){
                        return "H1";
                    }elseif($model->zongjian == 1){
                        return "H2";
                    }elseif($model->dongshi == 1){
                        return "H3";
                    }elseif($model->h4 == 1){
                        return "H4";
                    }elseif($model->h5 == 1){
                        return "H5";
                    }elseif($model->h6 == 1){
                        return "H6";
                    }else{
                        return "H0";
                    }
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {lock} {delete} {cancel-level} {agent}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'lock' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'lock'),
                            'aria-label' => Yii::t('yii', 'lock'),
                            //'data-pjax' => '0',
                            'class' => 'btn btn-default btn-xs',
                            'data' => ['confirm' => '你确定要开启/锁定账户吗？',]
                        ];
                        if($model->is_lock){
                            return Html::a('开启账户', [$url, 'id' => $model->id, 'is_lock' => $model->is_lock], $options);
                        }
                        return Html::a('锁定账户', [$url, 'id' => $model->id, 'is_lock' => $model->is_lock], $options);
                    },
                    'cancel-level' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'cancellevel'),
                            'aria-label' => Yii::t('yii', 'cancellevel'),
                            'class' => 'btn btn-default btn-xs',
                            'data' => ['confirm' => '你确定要取消账户级别吗？'],
                            //'data-pjax' => '0',
                        ];
                        return Html::a('取消级别', $url, $options);
                    },
                    'agent' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'agent'),
                            'aria-label' => Yii::t('yii', 'agent'),
                            'class' => 'btn btn-default btn-xs',
                            'data' => ['confirm' => '你确定要设为受理中心吗？'],
                            //'data-pjax' => '0',
                        ];
                        return Html::a('设为受理中心', $url, $options);
                    },
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
