<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
{include="head.html"}
<link href="{$GLOBALS['skin']}style/front/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="{$GLOBALS['skin']}js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="{$GLOBALS['skin']}js/lunhuan.js"></script>
<LINK rel=stylesheet type=text/css href="{$GLOBALS['skin']}style/front/zzsc.css">
<SCRIPT type=text/javascript src="{$GLOBALS['skin']}js/zzsc.js"></SCRIPT>
<div id="bn">
    <span class="tu">
    	{loop table="article" tid="30" limit="4"}
    	<a href="" class="lianjie"><img src="{$v['litpic']}" height="260" border="0"/></a>
        {/loop}
    </span>

    <div id="hao">
        <a class="xu">1</a>
        <a class="xu">2</a>
        <a class="xu">3</a>
        <a class="xu">4</a>
        <!--<a class="xu">5</a>-->
    </div>
    <!--<div class="tiao"></div>-->
</div>
<!--<div class="banner">

                    <ul>

                    {loop table="article" tid="30" limit="5"}
                    <li><a href="/#" target="_bank"><img src="{$v['litpic']}"    alt="" width="970" height="260"/></a></li>
                    {/loop}
                       </ul>
</div>-->
<script>
    $(".banner").yxMobileSlider({width:970,height:260,during:5000})
</script>
<div class="main">
<div class="product">
    <div class="title_t">
        <div class="text_title">产品展示</div>
        <div class="title_center"></div>
        <div class="more_title"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></div>
    </div>
    <div class="product_c">
        <div class="product_l">
            {loop table="article" tid="2" limit="8"}
            <div class="p_pic">
                <a href="{$v['url']}"><img src="{$v['litpic']}" alt="{$v['titile']}" width="113" height="83" /></a>
                <div class="p_text"><a href="{$v['url']}">{$v['titile']}</a></div>
            </div>

            {/loop}
        </div>
    </div>
</div>
<div class="serve">
    <div class="serve_t">
        <div class="title_s">服务内容</div>
        <div class="title_s_more"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></a></div>
    </div>
    <div class="serve_c">
        {loop table="article" tid="3" limit="4"}
        <div class="serve_c_l">
            <div class="serve_c_pic"><a href="{$v['url']}"><img src="{$v['litpic']}" width="111" height="109"></a></div>
            <div class="serve_c_text">
                <div class="serve_c_title"><a href="{$v['url']}" id="btcolor">{fun newstr($v['title'],10)}</a></div>
                <div class="serve_c_content">
                    {fun newstr($v['title'],35)}
                </div>

            </div>
        </div>
        {/loop}
    </div>
</div>
<div class="about">
    <div class="about_t">
        <div class="title_a">公司简介</div>
    </div>
    <div class="about_c">
        {loop table="classtype" tid="24"}
        <div class="about_pic">
            <div><a href="{$v['url']}"><img src="{$v['litpic']}" width="155" height="185"/></a></div>
        </div>
        <div class="about_text">
            <a href="{$v['url']}">{fun newstr($v['description'],350)}</a>

        </div>
        {/loop}
    </div>
</div>
<div class="gove">
    <div class="title_g" >
        <div class="text_title">国家标准</div>
        <div class="more_title"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></div>
    </div>
    <div class="clear"></div>
    <div class="gove_c">
        {loop table="classtype" tid="27"}
        <a href="{$v['url']}"><img src="{$v['litpic']}" width="202" height="191" /></a>
        {/loop}
    </div>
</div>
<div class="clear"></div>
<div class="jcwd">
    <div class="jcwd_t">
        <div class="title_j">公司优势</div>
        <div class="title_s_more"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></div>
    </div>
    <div class="clear"></div>
    <div class="jcwd_c">
        {loop table="article" tid="26" limit="6"}
        <p><a href="{$v['url']}">{$v['title']}</a></p>
        {/loop}
    </div>

</div>
<div class="gcal">
    <div class="gcal_t">
        <div class="text_title">服务案例</div>
        <div class="gcal_t_center"></div>
        <div class="more_title"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></div>
    </div>
    <div class="clear"></div>
    <div class="gcal_c">
        <div class="gcal_home">
            <div class="gcal_left"><a href="" target="_blank"><img src="{$GLOBALS['skin']}images/huanbao/jiating.gif"></a></div>
            <div class="gcal_right">
                <div id="demo">
                    <div id="indemo">
                        <div id="demo1">
                            <ul>
                                {loop table="article" tid="28" limit="4"}
                                <li>
                                    <a href="{$v['url']}"><img src="{$v['litpic']}" alt="" width="122" height="78" />	<span>{fun newstr($v['title'],35)}</span></a>
                                </li>

                                {/loop}

                            </ul>
                        </div>

                        <div id="demo2"></div>
                    </div>
                </div>
            </div>
            <script language="JavaScript">
                /*new Marquee("marqueediv",2,1,630,104,20,0,0)*/
                var speed=15;
                demo2.innerHTML=demo1.innerHTML;    //克隆demo1为demo2

                function Marquee(){
                    if(demo2.offsetWidth  <= demo.scrollLeft){    //当滚动至demo1与demo2交界时
                        demo.scrollLeft = 0;        //demo跳到最顶端
                    }
                    else{
                        demo.scrollLeft++;
                    }
                }
                var MyMar=setInterval(Marquee,speed);    //设置定时器
                demo.onmouseover=function() {clearInterval(MyMar);}//鼠标移上时清除定时器达到滚动停止的目的
                demo.onmouseout=function() {MyMar=setInterval(Marquee,speed);}//鼠标移开时重设定时器
            </script>
        </div>

        <div class="gcal_mon">
            <div class="gcal_left"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/danwei.gif"></a></div>
            <div class="gcal_right">
                <div id="scroll_div">
                    <div id="scroll_begin">
                        <div id="scroll_1">
                            <ul>
                                {loop table="article" tid="29" limit="4"}
                                <li>
                                    <a href="{$v['url']}"><img src="{$v['litpic']}" alt="" width="122" height="78" />	<span>{fun newstr($v['title'],35)}</span></a>
                                </li>
                                {/loop}
                            </ul>
                        </div>
                        <div id="scroll_2"></div>
                    </div>

                </div>
            </div>
            <script language="javascript">
                var speed1=15;
                scroll_2.innerHTML=scroll_1.innerHTML;    //克隆demo1为demo2

                function Marqueediv(){
                    if(scroll_2.offsetWidth  <= scroll_div.scrollLeft){    //当滚动至demo1与demo2交界时
                        scroll_div.scrollLeft = 0;        //demo跳到最顶端
                    }
                    else{
                        scroll_div.scrollLeft++;
                    }
                }
                var MyMar1=setInterval(Marqueediv,speed1);    //设置定时器
                scroll_div.onmouseover=function() {clearInterval(MyMar1);}//鼠标移上时清除定时器达到滚动停止的目的
                scroll_div.onmouseout=function() {MyMar1=setInterval(Marqueediv,speed1);}//鼠标移开时重设定时器
            </script>
        </div>

    </div>

</div>
<div class="clear"></div>
<div class="hyzs">
    <div class="hyzs_t">
        <div class="title_j">环保资讯</div>
        <div class="title_s_more"><a href=""><img src="{$GLOBALS['skin']}images/huanbao/more.jpg"></a></div>
    </div>
    <div class="clear"></div>
    <div class="hyzs_c">
        {loop table="article" tid="6" limit="8"}
        <p><a href="{$v['url']}">{$v['title']}</a></p>
        {/loop}
    </div>
</div>
<div class="yqsb">
    <div class="gcal_t">
        <div class="text_title">仪器设备</div>
        <div class="gcal_t_center"></div>
        <div class="more_title"><a href="list_1433.html"></a></div>
    </div>
    <div class="clear"></div>
    <div class="yqsb_c">
        {loop table="article" tid="25" limit="8"}
        <div class="y_r_list">
            <a href="{$v['url']}"><img src="{$v['litpic']}" alt="" width="122" height="78" /></a>
            <p><a href="{$v['url']}">{$v['title']}</a></p>
        </div>
        {/loop}

    </div>
</div>
<div class="clear"></div>
<div class="links">
    <div class="links_t">
        <div class="title_l">友情链接：</div>
        <div class="title_l_more"></div>
    </div>
    <table width="100%" cellspacing="2">
        <tr>
            {loop table="links"}
            <td width="10%" nowrap="nowrap"><a href="{$v['gourl']}" target="_blank">{$v['name']}</a></td>
            {/loop}
        <tr>
    </table>

</div>
</div>
{include="footer.html"}
