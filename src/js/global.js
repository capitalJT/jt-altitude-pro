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

	// using gist as a temporary bandaid
	$.getJSON('http://jabaltorres.com/wp-content/themes/jt-altitude-pro/jt-data.json', function(data) {
	    var items = [];
	  	$.each(data, function(idx, obj){ 
        	$.each(obj, function(key, value){

        		// check for external link
        		var aTarget = null;
				    if (value.extLink == true){
        			aTarget = 'target="_blank"';
        		} else {
        			aTarget = "";
        		}

        		// var clientName = value.client;
        		var description = value.description;
        		var role = value.role;
        		var imgSrc = value.imgSrc;
        		var linkHref = value.linkHref;

        		var output = "<li><a href='"+ linkHref +"'"+ aTarget +"><div class=\"text\"><h3>" + description +"</h3><span class=\"role\">"+ role +"</span></div><img src='"+ imgSrc +"'><span class=\"overlay\"></span></a></li>";

     			items.push( output );
        		
        	});
    	});
	 
	  	$( "<ul/>", { "class": "thumbnail-list", html: items }).appendTo( ".work" );
	});



  // $('#menu-primary-nav a').on('click',function (e) {
  //     e.preventDefault();
  //     var target = this.hash;
  //     $target = $(target);
  //     $('html, body').stop().animate({
  //         'scrollTop':  $target.offset().top //no need of parseInt here
  //     }, 900, 'swing', function () {
  //         window.location.hash = target;
  //     });
  //     console.log(target);
  // });

	$('#menu-primary-nav a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
				  scrollTop: target.offset().top
				}, 500);
				return false;
			}
		}
	});

	// $(window).scroll(function(){
	// 	var stickyElement = $('#custom_html-2'),
     //        stickytop = stickyElement.offset().top,
	// 		scroll = $(window).scrollTop();
    //
     //    var bottom = $('#categories-2').offset().top + $('#categories-2').outerHeight(true);
    //
	// 	if (scroll >= bottom) {
     //        stickyElement.addClass('fixed-widget');
	// 	} else {
     //        stickyElement.removeClass('fixed-widget');
	// 	}
	// });

});