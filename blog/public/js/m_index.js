$(function(){
    $(".side_dep1").click(function(){
        $(".side_dep1").removeClass('on');
        $(".side_dep1").children('ul').slideUp(500);
        $(this).addClass('on');
        $(this).children('ul').slideDown(500);
    });
    $('.ham_menu').click(function (e) { 
        $("#side_nav").animate({width:"toggle"},500)
        $("#side_bg").toggle()
    });
});