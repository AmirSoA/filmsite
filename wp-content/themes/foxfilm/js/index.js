jQuery(document).ready(function($){
	//open popup
	$('.icon_search').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	
	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.close_search') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });
});
	//go top
$(document).ready(function() {
			// Show or hide the sticky footer button
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});
			
			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();
				
				$('html, body').animate({scrollTop: 0}, 300);
			})
		});
		
// JavaScript Document
$(document).ready(function(e) {

	jQuery(window).scroll(function(){
        sticky_menu();
    });
		
		});

function sticky_menu(){
    var top = jQuery(window).scrollTop();
    var nav_top = jQuery('#menu').outerHeight();
    if (top > nav_top) {
        jQuery('#menu').addClass('sticky').children().addClass('container');
    } else
    {
        jQuery('#menu').removeClass('sticky');
    }
}
// menu mobile
$(document).ready(function(){
  $('.menu-tab').click(function(){
    $('.menu-hide').toggleClass('show');
    $('.menu-tab').toggleClass('active');
  });
  $('a').click(function(){
    $('.menu-hide').removeClass('show');
    $('.menu-tab').removeClass('active');
  });
});