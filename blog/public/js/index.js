$(function(){
    $(".sub_nav li").click(function(){
        var idx = $(this).index();

        $(".sub_nav li").removeClass("on")
        $(".sub_nav li").eq(idx).addClass("on")

        $(".sub_layout").removeClass("on")
        $(".sub_layout").eq(idx).addClass("on")
    });
});