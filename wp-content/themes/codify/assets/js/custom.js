(function ($) {
	'use strict';
		// Mean Menu 
		jQuery('.header-style1 .main-navigation,.header-style3 .main-navigation').meanmenu({
			meanMenuContainer: '.menu-holder',
			meanScreenWidth:"767",
			meanRevealPosition: "right",
			meanMenuClose: 'X',
		});
		jQuery('.header-style4 .main-navigation').meanmenu({
			meanMenuContainer: '.menu-holder',
			meanScreenWidth:"767",
			meanRevealPosition: "left",
			meanMenuClose: 'X',
		});


		// Mean Menu 
		jQuery('.header-style2 .main-navigation').meanmenu({
			meanMenuContainer: '.header-style2 .menu-holder',
			meanScreenWidth:"9000",
			meanRevealPosition: "left",
			meanMenuClose: 'X',
		});
	
	
	//keyboard navigation for mean menu
		var myEvents = {
		click: function(e) {
		  if ( jQuery(this).hasClass('menu-item-has-children') ) {
			jQuery(this).find('.mean-expand').addClass('mean-clicked').text('-');
		  }
		  jQuery(this).siblings('li').find('.mean-expand').removeClass('mean-clicked').text('+');
		  jQuery(this).children('.sub-menu').show().end().siblings('li').find('ul').hide();

		},

		keydown: function(e) {
		  e.stopPropagation();

		  if (e.keyCode == 9) {

			if (!e.shiftKey &&
			  ( jQuery('.mean-bar li').index( jQuery(this) ) == ( jQuery('.mean-bar li').length-1 ) ) ){
				jQuery('.meanclose').trigger('click');
			}  else if( jQuery('.mean-bar li').index( jQuery(this) ) == 0 ) {
			  $('.meanclose').removeClass('onfocus');
			}
			else if (e.shiftKey && jQuery('.mean-bar li').index(jQuery(this)) === 0)
			 jQuery('.mean-bar ul:first > li:last').focus().blur();
		  }
		},

		keyup: function(e) {
		  e.stopPropagation();
		  if (e.keyCode == 9) {
			if (myEvents.cancelKeyup) myEvents.cancelKeyup = false;
			else myEvents.click.apply(this, arguments);
		  }
		}
	  }

	  jQuery(document)
		.on('click', 'li', myEvents.click)
		.on('keydown', 'li', myEvents.keydown)
		.on('keyup', 'li', myEvents.keyup);

	  jQuery('.mean-bar li').each(function(i) { this.tabIndex = i; });
	
		// 	search js
	
	    var removeClass = true;
	    $(".search-wrapper").on("click",function () {
	        $(".search-section").toggleClass('search-open');
	        if ( $(".search-section").is('.search-open') ) { 
	        	setTimeout(function(){ $(".search-section").find('.field').focus(); }, 700 );
	        }
	        removeClass = false;
	    });

	    // when clicking the div : never remove the class
	    $(".search-header input").on("click",function () {
	        removeClass = false;
	    });

	    $(document).on('keyup', function(e){ 
			if ( e.keyCode === 27 && $('.search-section').hasClass('search-open') ) { 
				$(".search-section").removeClass('search-open');
			} 
			removeClass = true; 
		});
	    $(document).on('keyup', function(e){ 
			$('.search-open .close-icon').on("keyup", function() {
			  $(".search-section").removeClass('search-open');
			});			
		});		

	    // when click event reaches "html" : remove class if needed, and reset flag
	    $("html, .close-icon").on("click",function () {
	        if (removeClass) {
	        $(".search-section").removeClass('search-open');
	        }
	        removeClass = true;
	    });	   
	    
	    /*sticky sidebar*/
	    if ( $.fn.theiaStickySidebar ) {
		    $('#primary , #secondary').theiaStickySidebar({
		      additionalMarginTop: 30
		    });	 
	    }
		//scroll to top
		$('.back-to-top').hide();
		$('.back-to-top').on("click",function(e) {
		  e.preventDefault();
		  $('html, body').animate({ scrollTop: 0 }, 'slow');
		});


		$(window).scroll(function(){
		  var scrollheight =400;
		  if( $(window).scrollTop() > scrollheight ) {
			$('.back-to-top').fadeIn();
		  }
		  else {
			$('.back-to-top').fadeOut();
		  }
		});


})(jQuery);	