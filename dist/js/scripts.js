( function ( document, $, undefined ) {

	$(document).ready(function(){
		if ($('.dls-sidebar').length){
			$('.article-list-wrapper').append('<ul id="rendered-sections-list"></ul>');

			$( ".article-title" ).each(function( index ) {
		  		var theText = $(this).text();
		  		var theId = $(this).parent().attr('id');
		  		var theSbt = $(this).parent().data('sidebarText');

		  	
				if (theSbt){
					if (!$(this).parent().hasClass('article-list-item')){
						$("#rendered-sections-list").append('<li><a href="#'+theId+'" class="ancestor">'  + theSbt + '</a></li>');
					} else {
						$("#rendered-sections-list").append('<li><a href="#'+theId+'">'  + theSbt + '</a></li>');
					}
				}
			});

			$('.article-list-wrapper').append('<div id="scroll-to-top">Scroll To Top</div>');
		}

		$('#genesis-footer-widgets .footer-widgets-1').wrapInner('<div class="dls-container"></div>');

		var dlsWidgetWrappers = $('<div class="dls-widget-outer-wrapper"><div class="dls-widget-inner-wrapper"></div></div>');

		$('#genesis-footer-widgets .wrap').append(dlsWidgetWrappers);

		var widgies = $(".footer-widgets-2, .footer-widgets-3 ").detach();

		$('.dls-widget-inner-wrapper').append(widgies);

		// calculating some values
		var header_height = $('.site-header').outerHeight(),
		  dls_menu = $('.dls-menu').outerHeight(),
		  scroll_top_icon = $('#scroll-to-top'),
		  nav = $('.dls-sidebar');
		  sections = $('.article-list-item'),
		  sipt = parseInt($('.site-inner').css('padding-top'), 10), 
		  combined_height = header_height + dls_menu;

		// Scroll to top function 1/2
		$(window).scroll(function(){
		  var $scrollTop = $(window).scrollTop();

		  if( $scrollTop > header_height ){
		      scroll_top_icon.fadeIn();
		  } else {
		      scroll_top_icon.fadeOut();
		  }
		  
		  if( $scrollTop > combined_height + sipt ){
		    nav.addClass( 'sticky-sidebar' );
		  } else {
		    nav.removeClass( 'sticky-sidebar' );
		  }
		});

		$(window).scroll(function () {
		  var cur_pos = $(this).scrollTop();

		  sections.each(function() {
		    var top = $(this).offset().top,
		        bottom = top + $(this).outerHeight();

		    if (cur_pos >= top && cur_pos <= bottom) {
		      nav.find('a').removeClass('active-nav');
		      // nav.find('a').classList.add('active-nav');
		      sections.removeClass('active-nav');
		      
		      $(this).addClass('active-nav');
		      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active-nav');
		    }
		    if (cur_pos < combined_height) {
		      nav.find('a').removeClass('active-nav');
		    }

		  });

		  $('.title-slide-alt').each(function(){
		  	var top = $(this).offset().top,
		        bottom = top + $(this).outerHeight();
        if (cur_pos >= top && cur_pos <= bottom) {
		      nav.find('a').removeClass('active-nav');
		      sections.removeClass('active-nav');
		      
		      $(this).addClass('active-nav');
		      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active-nav');
		    }
		    if (cur_pos < combined_height) {
		      nav.find('a').removeClass('active-nav');
		    }
		  });

		});

		// Scroll to top function 2/2
		scroll_top_icon.click(function(){
		  var body = $("html, body");
		  body.animate({scrollTop:0}, '500', 'swing');
		});

		// - Smooth scroll sidebar
		nav.find('a').on('click', function () {
		  var $el = $(this), 
		       id = $el.attr('href');
		  
		  $('html, body').animate({
		    scrollTop: $(id).offset().top + 1
		  }, 500);
		  
		  return false;
		});

		// - Searchbar toggle
		$(".searchbar-toggle").click(function(){
		  $("#searchbar-collapse").slideToggle(180, "swing");
		});

		// - Rearrange sidebar
		$(".dls-sidebar").insertBefore("#genesis-content");


		// BS4 Carousel interval speed
        $('.carousel').carousel({
            interval: 1000 * 10
        })

		console.log("hi");

	});

	// Element fade in on scroll
    $(document).ready(function() {

        /* Every time the window is scrolled ... */
        $(window).scroll( function(){

            /* Check the location of each desired element */
            $('.hideme').each( function(i){

                var bottom_of_object = $(this).position().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();

                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    $(this).animate({'opacity':'1'},1000);
                }

            });

        });

        /* JT Modal */
        if ($('.has-modal').length) {
            $('.has-modal img').on('click', function (e) {
                e.preventDefault();
                // var lgImgSrc = $(this).attr('src').indexOf("-sm.") > 0 ? $(this).attr('src').replace("-sm.", ".") : $(this).attr('src');
                var lgImgSrc = $(this).attr('src');
                $('#imagePreview').attr('src', lgImgSrc.replace(/&width=.*/, ""));
                $('#imageModalLabel').html($(this).attr('alt'));
            });

            $('#jtModal').appendTo("body");
        }
    });
})( document, jQuery );
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
	$.getJSON('https://jabaltorres.com/wp-content/themes/jt-altitude-pro/jt-data.json', function(data) {
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

	var sum;
	function add(num1, num2){
		var sum = num1 + num2;
		return sum;
	}
	var result = add(12,23);
    console.log('two numbers added together: ' + result);


    var numbers = [1,2,3,4,5,4,3,2,1];
    var mapResult = numbers.map(function(item, index, array){
    	return item * 2;
	});

	console.log(mapResult);

	numbers.forEach(function(item, index, array){
        console.log(item * 2);
        // console.log('<li>' + item + '<\/li>');

		if ($('.js-playground').length){
            $('.entry-content').append('<li>' + item + '<\/li>');
		}
	});


    function jtCreateInput() {
        var x = document.createElement("INPUT");
        x.setAttribute("id", "jt-text-input");
        x.setAttribute("type", "text");
        // x.setAttribute("value", "Feed me");
        x.setAttribute("placeholder", "Enter your value here");
        x.setAttribute("style", "color:red; border: 1px solid blue; display: block;");

        if ($('.js-playground').length){
            $('.entry-content').append(x);
		}
    }

    function addElement() {
        // create a new div element
        var newDiv = document.createElement("div");
        newDiv.setAttribute('id', 'new-div');
        newDiv.setAttribute('class', 'new-class');

        // and give it some content
        var newContent = document.createTextNode("Hi there and greetings!");

        // add the text node to the newly created div
        newDiv.appendChild(newContent);

        // add the newly created element and its content into the DOM
        // var currentDiv = document.getElementById("div1");
        if ($('.js-playground').length) {
            $('.entry-content').append(newDiv);
        }
    }

    addElement();
    jtCreateInput();


    // What to do when enter key is pressed
    $("#jt-text-input").on("keydown",function search(e) {
        if (e.keyCode == 13) {
        	var thisVal = $(this).val();
            console.log( 'This value: ' + thisVal );

            var newDiv = document.getElementById('new-div');
            newDiv.innerHTML = thisVal;
            newDiv.style.cssText = 'padding: 12px; border: solid thin ' + thisVal + ';';
        }

        console.log("What is this: " + $(this).css());
    });


	// Closures Example
	function doSomeMath(a,b){
		// var a = 12;
		// var b = 32;
		var c = 3;

		function multiply(){
			var result = a * b / c;
			return result;
		}

		console.log("Some math was done");
		return multiply;
	}

	var theResult = doSomeMath(12,3);

	console.log( 'This is the result of the doSomeMath function: ' + theResult() );


	// function getWidth() {
	// 	var jtInput = document.getElementById('jt-text-input').offsetWidth;
	// 	console.log( "Result of the getWidth function: " + jtInput + "px");
    // }
	//
    // getWidth();

	if ( $('.page-id-19').length ){
		console.log("Page ID correct");
	}

    // document.getElementById('jt-text-input').setAttribute("style", "color:red; border: 1px solid blue;");
});


var jt = "jabal is cool";


var vidyardVideos = {
    video1: {
        uuid: "Rh2oJsa3HDj1hVPfKDCdeg",
        hash: "#reports-demo",
        name: "Reports Demo",
        text: "<p>The best movie ever.<\/p>"
    },
    video2: {
        uuid: "APxTNIXtBL6SoluRC_N2dQ",
        hash: "#sheets-demo",
        name: "Sheets Demo",
        text: "<p>The second best movie ever.<\/p><p>The second best movie ever.</p>"
    },
    video3: {
        uuid: "OxCDlNlSTZ2ZuT4xfUHKtQ",
        hash: "#dashboards-demo",
        name: "Dashboards Demo",
        text: "<p>The third best movie ever.<\/p>"
    },
    video4: {
        uuid: "5jgoBXkZCujmc_q02qj-eQ",
        hash: "#financial-planning-demo-sales",
        name: "Financial Planning Demo: Sales",
        text: "<p>The fourth best movie ever.<\/p>"
    },
    video5: {
        uuid: "X7Xhgmr_mXla9giD6Vlb5A",
        hash: "#captital-management-demo",
        name: "Capital Management Demo",
        text: "<p>The fifth best movie ever.<\/p>"
    },
    video6: {
        uuid: "48hjkrhSGAwiJ4c2_uA3oQ",
        hash: "#profitability-analysis-demo",
        name: "Profitability Analysis Demo",
        text: "<p>The sixth best movie ever.<\/p>"
    },
    video7: {
        uuid: "Q3hlMwq93Y157_RxYjtkcQ",
        hash: "#financial-close-demo",
        name: "Financial Close Demo",
        text: "<p>The seventh best movie ever.<\/p>"
    }
};


for(var key in vidyardVideos) {
    if (vidyardVideos.hasOwnProperty(key)) {
        var video = vidyardVideos[key];
        console.log(key);
        console.log(vidyardVideos[0]);
        console.log(vidyardVideos[key].text);
        console.log(video.uuid);
        console.log(video.hash);
        console.log(Object.getOwnPropertyNames(vidyardVideos));
    }
}


console.log('blahzay blahay');
// Theme Scripts
jQuery(function( $ ){

	if (document.location.hash) {
		window.setTimeout(function () {
			document.location.href += '';
		}, 10);
	}

	// Local Scroll Speed
	$.localScroll({
		duration: 750
	});

	// Image Section Height
	var windowHeight = $( window ).height();

	$( '.image-section' ) .css({'height': windowHeight +'px'});
		
	$( window ).resize(function(){
	
		var windowHeight = $( window ).height();
	
		$( '.image-section' ) .css({'height': windowHeight +'px'});
	
	});

});
