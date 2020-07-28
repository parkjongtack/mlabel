$(function(){
    var url = "{{request()->segment(2)}}";
    if(url != "notice1" || url != "inquiry1" || url != "inquiry2" || url != "notice2"){
        $(".sub_nav li").click(function(){
            var idx = $(this).index();

            $(".sub_nav li").removeClass("on")
            $(".sub_nav li").eq(idx).addClass("on")

            $(".sub_layout").removeClass("on")
            $(".sub_layout").eq(idx).addClass("on")
        });
    }
});