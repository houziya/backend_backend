/**
 * Created by Ydz on 2017/3/21.
 */
$(document).ready(function(){
    $(".deng li").hover(function(){
            $(this).addClass("hover");
            $(this).children("ul li").attr('class','');
        },function(){
            $(this).removeClass("hover");
            $(this).children("ul li").attr('class','');
        }
    );
    $(".deng li.no_sub").hover(function(){
            $(this).addClass("hover1");
        },function(){
            $(this).removeClass("hover1");
        }
    );
})
