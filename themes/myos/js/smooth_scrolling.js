$(document).ready(function(){
    $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

  $(document).scroll(function(scrollEvent){

      if(parseInt($('#main-nav + div').position().top - $(window).scrollTop()) <= 0){
          $('#fixed-nav').show(800);
      }else{
        $('#fixed-nav').hide(1000);
        
      }
    
    });

    $('.gallery-grid').masonry({
        // options
        itemSelector: '.gallery-item',
        columnWidth: 365
    });
});