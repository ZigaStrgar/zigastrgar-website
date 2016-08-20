$(function() {
    //mobile menu open
    var btn=$('.header__btn');
    var header=$('.header__links');
    btn.click(function(e) {
        e.preventDefault();
        header.toggleClass('open');
        btn.toggleClass('open');
        $('body').toggleClass("overflow");
    });
    //TO TOP
    $(window).scroll(function () {
        if ($(this).scrollTop() > 105) {
            $('header').addClass("scroll");
        } else {
            $('header').removeClass("scroll");
        }
    });
    //END TO TOP
});