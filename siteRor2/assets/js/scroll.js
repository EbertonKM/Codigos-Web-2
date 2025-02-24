$(function() {
    if($('target').length > 0) {
        var elemento = '#' + $('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html, body').animate({'scrollTop':divScroll - 100}, 500);
    }
})