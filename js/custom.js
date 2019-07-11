jQuery(function($){
	$('.vl-slider-wrap').owlCarousel({
		items:1,
	    margin:0,
	    loop:true,
	    mouseDrag: true,
	    autoplay: true,
	    nav: true,
	    dots: false,
	    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
	});
	
    $('.vl-ticker .owl-carousel').owlCarousel({
	    margin:10,
	    loop:true,
	    mouseDrag: false,
	    autoplay: true,
	    nav: true,
	    dots: false,
	    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	});

	$('.vl-toggle-menu').click(function(){
  		$('.vl-main-navigation .vl-menu').slideToggle();
    });

    $('.vl-menu > ul').superfish({
		delay:       500,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                         
	});

	$('#primary, #secondary').theiaStickySidebar({
		additionalMarginTop: 20,
		additionalMarginBottom : 20
    });

    $(window).scroll(function(){
		if($(window).scrollTop() > 300){
		  $('#vl-back-top').removeClass('vl-hide');
		}else{
		  $('#vl-back-top').addClass('vl-hide');
		}
  	});

	$('#vl-back-top').click(function(){
		$('html,body').animate({scrollTop:0},800);
	});

	$(".et-video-thumbnails").mCustomScrollbar({
		axis:"y",
		scrollbarPosition: "outside"
	});
    
    //add and remove the class on video playlist according to its width
	function youtube_videoplaylist_class(){
		$('#et-video-playlist').each(function(){
			var playlistWidth = $(this).outerWidth();
			if( playlistWidth < 788 ){
				$(this).addClass('shrink-playlist');
			}else{
				$(this).removeClass('shrink-playlist');
			}
		});
	}
    
    youtube_videoplaylist_class();

	$( window ).on( 'resize', function() {
		setTimeout( youtube_videoplaylist_class, 500 );
	} );

});