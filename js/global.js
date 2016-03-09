jQuery(function( $ ){

	if( $( document ).scrollTop() > 0 ){
		$( '.site-header' ).addClass( 'dark' );			
	}


	$(".site-container").append('<div class="scroll-to-top"></div>');

	$(".scroll-to-top").click(function(){
	  var body = $("html, body");
	  body.animate({scrollTop:0}, '500', 'swing');
	});

	// Add opacity class to site header
	$( document ).on('scroll', function(){

		if ( $( document ).scrollTop() > 0 ){
			$( '.site-header' ).addClass( 'dark' );			
			$('.scroll-to-top').addClass('scroll-to-top-show');
			$('.scroll-to-top').removeClass('scroll-to-top-hide');			

		} else {
			$( '.site-header' ).removeClass( 'dark' );
			$('.scroll-to-top').addClass('scroll-to-top-hide');
			$('.scroll-to-top').removeClass('scroll-to-top-show');				
		}
		
		console.log("function is running");

	});


	$( '.nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu' ).addClass( 'responsive-menu' ).before('<div class="responsive-menu-icon"></div>');

	$( '.responsive-menu-icon' ).click(function(){
		$(this).next( '.nav-primary .genesis-nav-menu,  .nav-secondary .genesis-nav-menu' ).slideToggle();
	});

	$( window ).resize(function(){
		if ( window.innerWidth > 800 ) {
			$( '.nav-primary .genesis-nav-menu,  .nav-secondary .genesis-nav-menu, nav .sub-menu' ).removeAttr( 'style' );
			$( '.responsive-menu > .menu-item' ).removeClass( 'menu-open' );
		}
	});

	$( '.responsive-menu > .menu-item' ).click(function(event){
		if ( event.target !== this )
		return;
			$(this).find( '.sub-menu:first' ).slideToggle(function() {
			$(this).parent().toggleClass( 'menu-open' );
		});
	});

	// var header_height = $('header').outerHeight();
	// console.log(header_height);
	// $(".site-inner").css("margin-top", header_height);

});

