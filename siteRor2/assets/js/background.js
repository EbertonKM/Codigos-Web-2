$(function() {
    var delay = 7;
    var currentBackground = 0;
    var maxBackground = $('.background').length - 1;

    initBackground();
    changeBackground();

    function initBackground() {
        $('.background').hide();
        $('.background').eq(currentBackground).show();
    }

    function changeBackground() {
        setInterval(function() {
            $('.background').eq(currentBackground).fadeOut(3000);
            currentBackground++;
            if (currentBackground > maxBackground) {
                currentBackground = 0;
            }
            $('.background').eq(currentBackground).fadeIn(3000)
        }, delay * 1000)
    }
});