$(function() {
    //console.log('Imprimindo no console');
    //alert('Funcionando');
    $('nav.mobile').click(function() {
        //var listaMenu = $('nav.mobile').find('ul'); //Outro jeito de fazer o mesmo que a linha de baixo
        var listaMenu = $('nav.mobile ul');
        var icone = $('nav.mobile div');
        //listaMenu.show();
        //listaMenu.fadeIn();
        //listaMenu.fadeOut();
        //listaMenu.slideToggle();

        if(listaMenu.is(':hidden')) {
            //listaMenu.fadeIn();
            //listaMenu.css('display', 'block');
            icone.removeClass('fa-bars');
            icone.addClass('fa-xmark');
            listaMenu.slideToggle(250);
        } else {
            //listaMenu.fadeOut();
            //listaMenu.css('display', 'none');
            listaMenu.slideToggle(400);
            icone.removeClass('fa-xmark');
            icone.addClass('fa-bars');
        }
    })

    if($('target').length > 0) {
        var elemento = '#' + $('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html, body').animate({'scrollTop':divScroll}, 1000);
    }
})