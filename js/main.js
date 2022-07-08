(function ($) {
	"use strict";

	 $(window).on('load', function(){
        // Prealoder
        $("#preloader").delay(500).fadeOut();
    });
	
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
	
		//>=, not <=
		if (scroll >= 65) {
			//clearHeader, not clearheader - caps H
			$(".header-area").addClass("is-stick");
		}else{
			$(".header-area").removeClass("is-stick");
		};
	});

    // Hamburger-menu
    $('.hamburger-menu').on('click', function () {
        $('.hamburger-menu, #menu').toggleClass('current');
    });

	        // counter
			$('.counter').counterUp({
				delay: 10,
				time: 2000
			});




			// progress animation slides

			$(document).ready(function() {
				var $slider = $('.slider');
				var $progressBar = $('.progress');
				var $progressBarLabel = $( '.slider__label' );
				
				$slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
				  var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
				  
				  $progressBar
					.css('background-size', calc + '% 100%')
					.attr('aria-valuenow', calc );
				  
				  $progressBarLabel.text( calc + '% completed' );
				});
				
				$slider.slick({
				  slidesToShow: 3,
				  slidesToScroll: 1,
				  speed: 400,
				  Array: false,
				  autoplay: true,
				  autoplaySpeed: 2000,
				  responsive: [
					{
					  breakpoint: 992,
					  settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					  }
					},
					{
					  breakpoint: 768,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					},
					{
					  breakpoint: 300,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					  }
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				  ]
				});  
			  });


				// Show or hide the sticky footer button
				$(window).on('scroll', function (event) {
					if ($(this).scrollTop() > 600) {
						$('.back-to-top').fadeIn(200)
					} else {
						$('.back-to-top').fadeOut(200)
					}
				});
			
				//Animate the scroll to top
				$('.back-to-top').on('click', function (event) {
					event.preventDefault();
			
					$('html, body').animate({
						scrollTop: 0,
					}, 1500);
				});

})(jQuery);