$(function() {
	var open = true;
	var windowSize = $(window)[0].innerWidth;

	if(windowSize <= 768) {
		open = false;
	}

	$('.menu-btn').click(function() {
		if(open) {
			$('header, .content').animate({width:'100%', left:'0'});
			$('aside').animate({left: '-250px'});
			open = false
		}else {
			windowSize = $(window)[0].innerWidth;
			$('header, .content').animate({width: (windowSize-250) + 'px', left:'250px'});
			$('aside').animate({left: '0'});
			open = true
		}
	})

	$(window).resize(function() {
		if(windowSize != $(window)[0].innerWidth) {
			windowSize = $(window)[0].innerWidth;
			if(open) {
				$('header, .content').css('width', 'calc(100% - 250px)');
			}else {
				$('header, .content').css('width', '100%');
			}
		}
	})
	
	$('[format="data"]').mask('00/00/0000')
})