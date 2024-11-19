$(function() {
    var current = - 1;
    var max = $('.tag').lenght - 1;
    var timer;
    var delay = 1;

    runAnimation();

    function runAnimation() {
        $('.tag').hide();
        timer = setInterval(animation, delay * 1000);

        function animation() {
            current ++
            if(current > max) {
                clearInterval(timer);
                return false;
            }
            $('.tag').eq(current).fadeIn(1500);
        }
    }
});