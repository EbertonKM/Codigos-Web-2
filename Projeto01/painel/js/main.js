$(function() {
    var open = true;
    var windowSize = $(window)[0].innerWidth;

    if(windowSize <= 768) {
        open = false;
    }

    $('.menu-btn').click(function() {
        if(open) {
            $('header, .content').animate({width:'100%', left:'0'});
            $('aside').fadeOut(500);
            open = false
        }else {
            windowSize = $(window)[0].innerWidth;
            $('header, .content').animate({width:windowSize-250, left:'250px'});
            $('aside').fadeIn(1);
            open = true
        }
    })

    if(windowSize != $(window)[0].innerWidth) {
        windowSize = $(window)[0].innerWidth;
        if(!open) {
            $('header, .content').animate({width:'100%', left:'0'});
        }else {
            $('header, .content').animate({width:windowSize-250, left:'250px'});
        }
    }
})