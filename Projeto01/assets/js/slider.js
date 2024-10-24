$(function() {
    //tempo do carrossel
    var delay = 2;
    //Valor do atual slide
    var currentSlide = 0;
    //Quantidade máxima de slides
    var maxSlide = $('.banner-single').length - 1;

    initSlider();
    changeSlide();

    function initSlider() {
        $('.banner-single').hide();
        $('.banner-single').eq(currentSlide).show();
    }

    function changeSlide() {
        setInterval(function() {
            $('.banner-single').eq(currentSlide).fadeOut(1500);
            currentSlide++;
            if (currentSlide > maxSlide) {
                currentSlide = 0;
            }
            $('.banner-single').eq(currentSlide).fadeIn(1500);
            //Troca a marcação do bullet
            $('.bullets span').eq(currentSlide - 1).removeClass();
            $('.bullets span').eq(currentSlide).addClass("active-slider");
        }, delay * 1000)
    }

    for(var i = 0; i < maxSlide + 1 ; i++) {
        //Recuperando o conteúdo HTML do .bullets
        var content = $('.bullets').html();
        content += '<span></span>';
        $('.bullets').html(content);
    }
    $('.bullets span').eq(currentSlide).addClass("active-slider");
    
    //Clicar em bullets e eles e os slides acompanharem
    $('body').on('click', '.bullets span', function() {
        var currentBullet = $(this);
        if (currentBullet.index() != currentSlide){
            $('.banner-single').eq(currentSlide).fadeOut(500);
            currentSlide = currentBullet.index();
            $('.banner-single').eq(currentSlide).fadeIn(500);
            $('.bullets span').removeClass();
            currentBullet.addClass('active-slider');
        }
    })
})