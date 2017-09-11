<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\sidenav\SideNav;
use backend\assets\AppAsset;
use yii\helpers\Html;
use mdm\admin\components\MenuHelper;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap" style="margin-left: 5%; margin-right:5%">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <?php if(!Yii::$app->user->isGuest) {?>
        <div class="col-lg-2" style="margin-top: 6%">
            <?php
            $type=SideNav::TYPE_DEFAULT;
            $heading='导航';
            $item='';
            echo SideNav::widget([
                'type' => $type,
                'encodeLabels' => false,
                'heading' => $heading,
                'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
            ]);
            ?>
        </div>
        <div class="col-lg-9" style="margin-top: 4%">
            <?= $content ?>
        </div>
    <?php }else{?>
    <div class="col-lg-12" style="margin-top: 5%">
        <?= $content ?>
    </div>
    <?php } ?>
</div>

<footer class="footer" style="width:100%; float: left">
    <div class="container">
        <p class="pull-left">&copy; 后台系统 <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
