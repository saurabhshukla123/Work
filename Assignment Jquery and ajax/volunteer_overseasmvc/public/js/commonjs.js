
$(window).scroll(function () {
    if ($(window).scrollTop() > 0) {				
        var sticky1 = $('.sticky1');
        sticky1.addClass('header-fixed-nav');				
        $("#loginbtn").addClass('button-fix-login');
        $("#overseaslogo").attr('src', "public/images/logo.png");
    }
    else {
        var sticky1 = $('.sticky1');
        sticky1.removeClass('header-fixed-nav');				
        $("#loginbtn").removeClass('button-fix-login');
        $("#overseaslogo").attr('src', "public/images/logo_1.png");
    }
});
