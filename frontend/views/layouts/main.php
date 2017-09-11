<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$this->metaTags[] = "<meta name='keywords' content='河北共惠包装新产品有限公司,河北共惠,河北共惠包装产品,共惠,河北共惠包装,河北共惠纸杯,河北共惠餐巾纸,共惠包装,共惠容器,共惠餐巾纸,共惠纸杯,餐巾纸,纸杯'/>";
$this->metaTags[] = "<meta name='description' content='河北共惠包装新产品有限公司,河北共惠,河北共惠包装产品,共惠,河北共惠包装,河北共惠纸杯,河北共惠餐巾纸,共惠包装,共惠容器,共惠餐巾纸,共惠纸杯,餐巾纸,纸杯'/>";
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
    <script type="text/javascript" src="/backend/web/js/jquery-1.8.3.min.js"></script>
    <!--<LINK rel=stylesheet type=text/css href="/frontend/web/css/gonghui/css.css">-->
    <LINK rel=stylesheet type=text/css href="/frontend/web/css/gonghui/home.css">
    <LINK rel=stylesheet type=text/css href="/frontend/web/css/gonghui/lrtk.css">
</head>
<?php $this->beginBody() ?>
<body>

    <div class="toptop">
        <div class="topcontent">
            <div class="logo">
                <a href="index.html"><img src="/frontend/web/images/logo.png"/></a>
            </div>
            <ul class="deng">
                <li><span
                        style="color: #00468c; line-height: 22px; font-size: 15px; font-weight: bold;">tel:18519184446</span><!--<img src="/frontend/web/images/tel.png"/>-->
                </li>
                <li class="email">
                    <a href="#" class="tablink"><img src="/frontend/web/images/yx.png"/></a>
                    <ul>
                        <li>
                            <!--<script type="text/javascript"
                                    src="http://exmail.qq.com/zh_CN/htmledition/js_biz/outerlogin.js"
                                    charset="gb18030"></script>-->
                            <script type="text/javascript">
                                //writeLoginPanel({domainlist: "hbgonghui.com", mode: "vertical"});
                            </script>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
    <div class="menu" id="chromemenu">
        <div class="menumain">
            <ul>
                <li><a href="/">首　页</a></li>
                <li><a rel="dropmenu1" href="<?= \yii\helpers\Url::to(["content/about"]) ?>">公司概况</a></li>
                <!--<li><a rel="dropmenu8" href="chengdu.asp">成都高森</a></li>-->
                <li><a rel="dropmenu2" href="news.asp">公司新闻</a></li>
                <li><a rel="dropmenu3" href="product.asp">公司产品</a></li>
                <li><a rel="dropmenu4" href="pinzhi.asp">品质保证</a></li>
                <li><a rel="dropmenu5" href="jszb.asp">技术装备</a></li>
                <li><a rel="dropmenu6" href="customer.asp">合作客户</a></li>
                <li><a rel="dropmenu7" href="contact.asp">联系我们</a></li>
            </ul>
        </div>
        <!--1 drop down menu -->
        <div id="dropmenu1" class="dropmenudiv">
            <a href="about.asp">公司简介</a>
            <a href="linian.asp">品牌理念</a>
            <a href="mov.asp">精彩视频</a>
        </div>
        <!--2 drop down menu -->
        <div id="dropmenu2" class="dropmenudiv">
            <a href="news.asp">公司动态</a>
            <a href="news.asp?newtype=%D0%D0%D2%B5%D0%C2%CE%C5">行业新闻</a>
        </div>
        <!--3 drop down menu -->
        <div id="dropmenu3" class="dropmenudiv">
            <a href="product.asp">500ML易拉罐</a>
            <a href="product.asp?cptype=330ML%E6%98%93%E6%8B%89%E7%BD%90">300ML易拉罐</a>
        </div>
        <!--4 drop down menu -->
        <div id="dropmenu4" class="dropmenudiv">
            <a href="rongyu.asp">资质荣誉</a>
            <a href="zhiliang.asp">质量管控</a>
        </div>

        <!--5 drop down menu -->
        <div id="dropmenu5" class="dropmenudiv">
            <a href="jszb.asp">车间厂房</a>
            <a href="shebei.asp">生产设备</a></div>

        <!--6 drop down menu -->
        <div id="dropmenu6" class="dropmenudiv">
            <a href=big.asp?id=36&classid=11>王老吉</a><a href=big.asp?id=22&classid=11>青岛啤酒</a><a
                href=big.asp?id=21&classid=11>雪花啤酒</a><a href=big.asp?id=31&classid=11>健力宝</a><a
                href=big.asp?id=19&classid=11>燕京啤酒</a><a href=big.asp?id=17&classid=11>蓝带啤酒</a><a
                href=big.asp?id=16&classid=11>珠江啤酒</a><a href=big.asp?id=15&classid=11>金威啤酒</a><a
                href=big.asp?id=14&classid=11>金星啤酒</a><a href=big.asp?id=13&classid=11>银麦啤酒</a></div>

        <!--7 drop down menu -->
        <div id="dropmenu7" class="dropmenudiv">
            <a href="contact.asp">联系方式</a>
            <a href="message.asp">留言反馈</a>
        </div>
        <!--<script type="text/javascript">cssdropdown.startchrome("chromemenu")</script>-->
    </div>
    <?= $content ?>


<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <? /*= date('Y') */ ?></p>

        <p class="pull-right"><? /*= Yii::powered() */ ?></p>
    </div>
</footer>-->
</body>
</html>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
