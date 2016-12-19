$(document).ready(function(){
    $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	 
	  if (target.length) {
        var scrollOffsetHeight = 100;
		
		if($(window).width() <= 990){
			scrollOffsetHeight = ($(window).height()) + 100;  
		}				
		if($(window).width() <= 768){
			scrollOffsetHeight = ($(window).height()) + 100;  
		}

		$('html, body').animate({
          scrollTop: target.offset().top - scrollOffsetHeight
        }, 1000);
	 	
		setTimeout($('.collapse.in').removeClass('in'),1500);
		
		
		return false;
      }
    }
  });

  $(document).scroll(setFixedNavbar);
  $(window).resize(function(resizeEvent){

	if(!($(window).width() > 990)){
		$('#fixed-nav').removeClass('sticky');
		}
	});

});

var setFixedNavbar = function(scrollEvent){
      if($(window).width() > 990){
        if(parseInt($('#main-nav + div').position().top - $(window).scrollTop()) <= 0){
            $('#fixed-nav').addClass('sticky');
        }else{
          $('#fixed-nav').removeClass('sticky');
          
        }
      }
    }
