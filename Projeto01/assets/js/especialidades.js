$(function() {
    var current = -1;
    var max = $('.box-especialidades').lenght - 1;
    var timer;
    var delay = 1.01;

    runAnimation();

    function runAnimation() {
        $('.box-especialidades').hide();
        timer = setInterval(animation, delay * 1000);

        function animation() {
            current++;
            if (current > max) {
                clearInterval(timer);
                return false;
            }
            $('.box-especialidades').eq(current).fadeIn();
        }
    }
})