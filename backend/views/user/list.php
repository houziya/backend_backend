<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Article;

$this->title = '系统用户列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            [
                'attribute' =>'status',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return \backend\models\User::$userStatusText[$model->status];
                }
            ],
            [
                'attribute' =>'created_at',
                'headerOptions' => ['width' => '10'],
                'value'=>function($model){
                    return date("Y-m-d H:i:s", $model->created_at);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
