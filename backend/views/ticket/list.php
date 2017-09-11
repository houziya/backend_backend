<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\ZyrjCard;

$this->title = '入场券列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('创建门票', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'card_no',
            'buser_id',
            'bid',
            [
                'attribute' =>'b_time',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return date("Y-m-d H:i:s", $model->b_time);
                }
            ],
            'is_use',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
