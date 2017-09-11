/**
 * Created by Ydz on 2017/3/20.
 */
$(function () {
    $("#slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        // 对应外层div的class : slide_container
        namespace: "slide"
    });
});