( function( $ ) {
    /*9 Tab*/
    /*13 Enter*/
	/*primary menu submenu on header*/
	$( document ).on('focus','#cwp-header-wrap .cwp-primary-menu-wrapper a',function(e){
		$(this).parentsUntil( ".cwp-primary-menu",'li' ).addClass('cwp-open-submenu');
	});
	$( document ).on('blur','#cwp-header-wrap .cwp-primary-menu-wrapper a',function(e){
		$('.cwp-primary-menu li').removeClass('cwp-open-submenu');
	});
	/*primary menu submenu on menu sidebar*/
	$( document ).on('focus','.cwp-header-menu-sidebar .cwp-primary-menu-wrapper a',function(e){
		$(this).next('.sub-menu').addClass('open');
		$(this).parentsUntil( ".cwp-primary-menu",'li .sub-menu' ).addClass('open');
	});
	$( document ).on('blur','.cwp-header-menu-sidebar .cwp-primary-menu-wrapper a',function(e){
		$('.cwp-header-menu-sidebar .cwp-primary-menu li .sub-menu').removeClass('open');
	});

	/*Menu Icon Close/Open*/
    $( document ).on('keydown','.cwp-header-menu-sidebar',function(e){
        const parent = document.getElementById('cwp-header-menu-sidebar');
        var keyCode = e.keyCode || e.which;
        if (keyCode === 9) {
            parent.addEventListener('focusout', e => {
                const leavingParent = !parent.contains(e.relatedTarget);
                if (leavingParent) {
                    $('.cwp-close-btn').trigger('click');
                    $('#cwp-menu-icon-btn-text').focus();
                }
            });
        }
    });

	$( document ).on('keydown','.cwp-close-btn',function(e){
		let key = e.which;
		if(key === 13) {
			$('#cwp-menu-icon-btn-text').focus();
		}
	});
	$( document ).on('keydown','#cwp-menu-icon-btn-text',function(e){
		let key = e.which;
		if(key === 13) {
			e.preventDefault();
			$('body').addClass('cwp-show-menu-sidebar');
			e.stopPropagation();
			$('.cwp-close-btn').focus();
		}
	});

	/*Dropdown Search*/
    $( document ).on('keydown','#cwp-dropdown-search-form-wrapper',function(e){
        let dropdownSearch = document.getElementById('cwp-dropdown-search-form-wrapper');
        let keyCode = e.keyCode || e.which;
        if (keyCode === 9) {
            dropdownSearch.addEventListener('focusout', e => {
                let leavingSearchParent = !dropdownSearch.contains(e.relatedTarget);
                if (leavingSearchParent) {
                    $('.cwp-search-dropdown').removeClass('is-active-dropdown');
                }
            });
        }
    });

} )( jQuery );

/**
 * Skip link focus fixed
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
}() );



jQuery(document).ready(function($){
    var cwp_window = $(window),
        cwp_body                     = $('body'),
        cwp_document                 = $(document),
        cwp_banner                  = $('.cwp-banner' ),
        offcanvas_sidebar           = $('.cwp-offcanvas-sidebar' ),
        headermenu_sidebar          = $('.cwp-header-menu-sidebar' ),
        search_overlay_wrapper      = $('.cwp-search-overlay-wrapper'),
        offcanvas_body_wrapper      = $('.cwp-offcanvas-body-wrapper'),
        menu_wrapper                = $('.cwp-menu-wrapper'),
        register                    = $('#register'),
        login                       = $('#login'),
        footer_main                 = $('.cwp-dynamic-footer'),
        footer_height               = footer_main.innerHeight(),
        fixed_footer_trigger_height = $('.cwp-sticky-footer-wrapper').innerHeight(),
        footer_wrapper              = $('.cwp-footer-wrapper'),
        footer_wrapper_height       = footer_wrapper.innerHeight(),
        dynamic_header              = $('.cwp-dynamic-header'),
        overlay_fixed_header_height = dynamic_header.innerHeight(),
        main_body_wrapper           = $('.cwp-body-main-wrap'),
        primary_menu                = $('.cwp-primary-menu-wrapper'),
        secondary_menu              = $('.cwp-secondary-menu-wrapper'),
        dropdown_menu               = $('.cwp-header-menu-toggle-dropdown'),
        primary_submenu_indicator   = primary_menu.data('submenu-icon'),
        secondary_submenu_indicator = secondary_menu.data('submenu-icon'),
        dropdown_submenu_indicator  = dropdown_menu.data('submenu-icon'),
        offcanvas_submenu_indicator = offcanvas_sidebar.data('submenu-icon'),
        scroll_top = $('.cwp-scroll-to-top');

    function add_primary_submenu_indicator() {

        primary_menu.find('li').each(function () {
            var this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                if( this_li.children('a').children('.submenu-icon').length ){
                    this_li.find('.submenu-icon').removeClass().addClass('submenu-icon '+primary_submenu_indicator)
                }
                else{
                    this_li.children('a').prepend("<i class='submenu-icon "+primary_submenu_indicator+"'></i>")
                }
            }

        });
    }
    add_primary_submenu_indicator();

    function add_dropdowm_submenu_indicator() {
        dropdown_menu.find('li').each(function () {
            var this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                if( this_li.children('a').children('.submenu-icon').length ){
                    this_li.find('.submenu-icon').removeClass().addClass('submenu-icon '+dropdown_submenu_indicator)
                }
                else{
                    this_li.children('a').prepend("<i class='submenu-icon "+dropdown_submenu_indicator+"'></i>")
                }
            }

        });
    }
    add_dropdowm_submenu_indicator();

    function add_secondary_submenu_indicator() {
        secondary_menu.find('li').each(function () {
            var this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                if( this_li.children('a').children('.submenu-icon').length ){
                    this_li.find('a .submenu-icon').removeClass().addClass('submenu-icon '+secondary_submenu_indicator)
                }
                else{
                    this_li.children('a').prepend("<i class='submenu-icon "+secondary_submenu_indicator+"'></i>")
                }
            }
        });
    }
    add_secondary_submenu_indicator();

    function add_offcanvas_submenu_indicator() {
        offcanvas_sidebar.find('li').each(function () {
            var this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                this_li.children('a').prepend('<i class="submenu-icon '+offcanvas_submenu_indicator+'"></i>')
            }
        });
        offcanvas_sidebar.find('.widget_nav_menu').each(function () {
            var this_nav = $(this);
            this_nav.addClass('navigation cwp-submenu-onclick');
        });
    }
    add_offcanvas_submenu_indicator();

    //Submenu icon click function
    cwp_document.on('click','.submenu-icon',function(e){
        e.preventDefault();
        var submenuIcon = $(this);
        submenuIcon.parent('a').siblings('.sub-menu').toggleClass('open');
    });

    function header_menu_sidebar_toggle() {
        $('.cwp-search-fullscreen-wrapper').removeClass('cwp-show-search');
        search_overlay_wrapper.removeClass('cwp-show-search');
        search_overlay_wrapper.closest('.grid-container').removeClass('hide-elements');
        cwp_body.removeClass('cwp-show-menu-sidebar');
        cwp_body.removeClass('cwp-show-offcanvas-sidebar');
        cwp_body.removeClass('cwp-show-menu-slide');
    }
    
    cwp_document.on('click','.cwp-popup-btn',function(){
        $('#cwp-popupModal').show();
        cwp_body.addClass('open-popup');
    });
    cwp_document.on('click','#cwp-popupModal .cwp-close',function(){
        $('#cwp-popupModal').hide();
        cwp_body.removeClass('open-popup');
    });

     //fixed footer
    function stickyFooter(){
        if (cwp_body.hasClass('cwp-sticky-footer')) {
            if (cwp_window.width() > 992) {
                var bottom_value = footer_height - fixed_footer_trigger_height;
                footer_main.css('bottom', - bottom_value);
              
                $('.cwp-sticky-footer-btn').on('click',function(){
                    //var footer_main_height =  footer_wrapper_height - fixed_footer_trigger_height;
                  footer_main.toggleClass('open-footer');
                    if( footer_wrapper_height >= cwp_window.height()/2 ){
                        footer_wrapper.addClass('scroll-footer');
                        footer_wrapper.css('max-height',cwp_window.height()/2);
                        bottom_value =   (cwp_window.height()/2 );
                        footer_main.css('bottom', - bottom_value);
                        $('.cwp-scrollbar-inner').scrollbar();
                    }
                });
            }
        }
    }

    //footer parallax
    function parallaxFooter(){
       var win = cwp_window.height(),
            parallaxFooterHeight = win*0.5;

        if (cwp_body.hasClass('cwp-parallax-footer')) {
            if (cwp_window.width() > 992) {
                main_body_wrapper.css('margin-bottom', footer_height);
                if( footer_height > parallaxFooterHeight ){
                    var scrollbar_inner = $('.cwp-scrollbar-inner');
                    main_body_wrapper.css('margin-bottom', parallaxFooterHeight);
                    scrollbar_inner.css('max-height', parallaxFooterHeight);
                    scrollbar_inner.scrollbar();
                }
                          
            }
            else{
                var main_body_wrapper_style = main_body_wrapper.attr('style');
                if (typeof main_body_wrapper_style !== typeof undefined && main_body_wrapper_style !== false) {
                    main_body_wrapper.removeAttr('style');
                }
            }
        }          
    }
    parallaxFooter();

    //Blog grid convert in mobile devices
    function blogMainGridConvert(){
        if (cwp_window.width() < 992) {
            for (var i = 1; i<= 12; i++) {
                //$('.cwp-dynamic-footer .grid-'+i+'').removeClass('grid-'+i+'').addClass( 'grid-md-'+i+'');
                $('.cwp-body-main-wrap .cwp-grid-column.grid-'+i+', .cwp-dynamic-footer .cwp-grid-column.grid-'+i+'').removeClass('grid-'+i+'').addClass( 'grid-md-'+i+'');
            }
        }
    }
    blogMainGridConvert();

    //What happen on window scroll
    function stickyMenu() {
        var scrollTop = cwp_window.scrollTop();
        if ( scrollTop > 250 ) {
            $('.cosmoswp-sticky').addClass('add-sticky');
            $('.scrollup').show();
            scroll_top.show();
        }
        else {
            $('.cosmoswp-sticky').removeClass('add-sticky');
            $('.scrollup').hide();
            scroll_top.hide();
        }
    }
    stickyMenu();

    // mobile devices sticky menu fix
    function menuStickyFix(){
        var scrollMobile = cwp_window.scrollTop();
        if (cwp_body.hasClass('admin-bar')) {
            if (cwp_window.width() < 768) {
                if ( scrollMobile > 0 ) {
                    $('.cwp-header-sticky').css('top','0');
                }
                else{
                    $('.cwp-header-sticky').css('top','');
                }           
            }

        } 
    }

    /*scroll top*/
    scroll_top.click(function(event) {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
        event.preventDefault();
    });

    //overlay fixed header top spacing
    function overlayFixedAndTransparentHeaderSpacing(){
        var added_height = 40;
        if(cwp_body.hasClass('gutentor-active')){
            added_height = 0;
        }
        if (cwp_body.hasClass('cwp-overlay-fixed') && !cwp_body.hasClass('home')) {
            if (cwp_banner.length && dynamic_header.hasClass('cwp-header-sticky')) {
                main_body_wrapper.css('padding-top', '');
            }
            else if(cwp_banner.length) {
                main_body_wrapper.css('padding-top', '');
            }
            else{
                main_body_wrapper.css('padding-top', overlay_fixed_header_height+added_height);
            }
        }
        else {
            if(cwp_body.hasClass('cwp-overlay-transparent') && !cwp_body.hasClass('home')){
                if(cwp_banner.length) {
                    main_body_wrapper.css('padding-top', '');
                }
                else{
                    main_body_wrapper.css('padding-top', overlay_fixed_header_height+added_height);
                }
            }
        }
    }
    overlayFixedAndTransparentHeaderSpacing();

    function cosmoswpMasonry() {
        if ( cwp_body.hasClass('cwp-masonry-blog') ){
            var $masonry_boxes = $( '.cwp-dynamic-blog-content' );
            $masonry_boxes.hide();

            var $container = $( '.cwp-blog-grid-row' );
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.cwp-blog-grid'
                });
            });
            $masonry_boxes.show();

            $(window).resize(function () {
                $container.masonry('bindResize')
            });
        }
    }
    cosmoswpMasonry();

    cwp_window.on("load", function() {

        //Sticky Sidebar
        if( typeof $.fn.theiaStickySidebar !== 'undefined' ){
            if( cwp_body.hasClass( 'add-sticky-sidebar') ){
                $('.cwp-ms-content-grid-column').theiaStickySidebar();
            }
        }

        /*parallax scolling*/
        $('a[href*="\\#"]').click(function(event){
            var cwp_offset= $.attr(this, 'href');
            var id = cwp_offset.substring(1, cwp_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( cwp_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( cwp_offset ).offset().top-$('#navbar').height()
                }, 1000);
                event.preventDefault();
            }
        });

        //sticky footer
        stickyFooter();

        //parallax footer
        parallaxFooter();


        //search click function
        cwp_document.on('click','#search-icon',function(e){
            $('.cwp-search-dropdown').toggleClass('is-active-dropdown');
            e.preventDefault();
        });

        //search full screen
        cwp_document.on('click','#search-fullscreen-icon',function(){
            $('.cwp-search-fullscreen-wrapper').addClass('cwp-show-search');
        });

        //search overlay screen
        cwp_document.on('click','#search-overlay-icon',function(){
            search_overlay_wrapper.addClass('cwp-show-search');
            search_overlay_wrapper.closest('.grid-container').addClass('hide-elements');
        });

        //Global Close Button
        cwp_document.on('click','.cwp-close-btn',function(e){
            header_menu_sidebar_toggle();
        });

    
        //login/register
        $('.login').on('click','.login-icon-text',function(){
            $('.form-wrapper').toggleClass('show-form');
        });
        register.hide();
        $('#register-form').on('click',function(){
            login.hide();
            $register.show();
        });
        $('#login-form').on('click',function(){
            login.show();
            register.hide();      
        });

        //Toggle Dropdown Menu
        cwp_document.on('click','.cwp-toggle-dropdown-btn',function(){
            var btn_this = $(this);
            $('.cwp-header-menu-toggle-dropdown').animate({
                height:"toggle"
            },500);
            var clicks = btn_this.data('clicks');
            if (clicks) {
                btn_this.find(".cwp-open-icon").show();
                btn_this.find(".cwp-close-icon").hide();
            }
            else {
                btn_this.find(".cwp-open-icon").hide();
                btn_this.find(".cwp-close-icon").show();
            }
            btn_this.data("clicks", !clicks);
        });
        
        //Sidebar Slide/Push Menu
        if ( headermenu_sidebar.hasClass( "cwp-left-menu-push" ) ) {
            menu_wrapper.addClass('cwp-left-push');
        }
        if ( headermenu_sidebar.hasClass( "cwp-right-menu-push" ) ) {
            menu_wrapper.addClass('cwp-right-push');
        }

        cwp_document.on('click','#cwp-menu-icon-btn-text',function(e){
            e.preventDefault();
            cwp_body.addClass('cwp-show-menu-sidebar');
            e.stopPropagation();
        });

        //Offcanvas Sidebar
        if ( offcanvas_sidebar.hasClass( "cwp-offcanvas-left" ) ) {
            offcanvas_body_wrapper.addClass('cwp-offcanvas-left-push');
        }
        if ( offcanvas_sidebar.hasClass( "cwp-offcanvas-right" ) ) {
            offcanvas_body_wrapper.addClass('cwp-offcanvas-right-push');
        }

        cwp_document.on('click','.cwp-offcanvas-btn',function(e){
            cwp_body.addClass('cwp-show-offcanvas-sidebar');
        });


        // Scrollup & Scrolldown sticky header
        var previousscroll    = 0,
        scrollup              = false,
        scrolldown            = true,
        prevhighestdownscroll = 0,
        header_wrap           =  $('#cwp-header-wrap'),
        main_wrap             =  $('#cwp-main-wrap'),
        scrolltype            =   main_wrap.data('scrolltype'),
        trigger_height        =   main_wrap.data('height-trigger-sticky'),
        sticky_color          =   main_wrap.data('sticky-color');

        cwp_window.scroll(function(event){
            var scrolltop = $(this).scrollTop();
            if ( typeof scrolltype !== 'undefined' || scrolltype !== null ){
                if (previousscroll > scrolltop ){
                    scrollup   = true;
                    scrolldown = false;
                }
                else{
                    scrolldown            = true;
                    scrollup              = false;
                    prevhighestdownscroll = scrolltop;
                }
                if(scrollup){
                    if (Math.abs(prevhighestdownscroll - trigger_height ) > scrolltop){
                        if ( scrolltype === 'cwp-scroll-up-sticky' ){

                            header_wrap.addClass('cwp-scroll-up-sticky');
                            if ( sticky_color === 'enable' ) {
                                header_wrap.addClass('sticky-color');
                            }
                        }
                        if ( scrolltop === 0 ) {

                            if (scrolltype === 'cwp-scroll-up-sticky'){
                                header_wrap.removeClass('cwp-scroll-up-sticky');
                            }
                            else if (scrolltype === 'cwp-scroll-down-sticky') {
                                header_wrap.removeClass('cwp-scroll-down-sticky');
                            }
                            header_wrap.removeClass('sticky-color');

                        }
                    }
                }
                if(scrolldown){
                    if ( scrolltop > trigger_height){
                        if ( scrolltype === 'cwp-scroll-down-sticky' ){
                            header_wrap.addClass('cwp-scroll-down-sticky');
                            if ( sticky_color === 'enable' ) {
                                header_wrap.addClass('sticky-color');
                            }
                        }
                    }
                }
                previousscroll = scrolltop;
            }
            if (scrolltop >= 100) {
                if(scrolltype === 'normal'){
                    if ( sticky_color === 'enable' ) {
                        header_wrap.addClass('sticky-color');
                    }
                }
            }
            else {
                header_wrap.removeClass('sticky-color');
            }

            // mobile devices sticky menu fix
            menuStickyFix();
        });
        /* add global widget title and content align class */
        var cosmoswp_sidebar      = $('.cwp-sidebar'),
        global_widget_title_align   =   cosmoswp_sidebar.data('widget-title'),
        global_widget_content_align =   cosmoswp_sidebar.data('widget-content');
       
        add_widget_element_align_class(cosmoswp_sidebar,'widget-title',global_widget_title_align);
        add_widget_element_align_class(cosmoswp_sidebar,'widget',global_widget_content_align);

        /*add footer widget title and  content align class*/
        //top footer 
        var footer_sidebar              = $('.cwp-footer-sidebar'),
        footer_top                      = $('.cwp-top-footer'),
        top_footer_widget_title_align   =   footer_top.data('widget-title'),
        top_footer_widget_content_align =   footer_top.data('widget-content');

        add_widget_element_align_class(footer_top,'widget-title',top_footer_widget_title_align); 
        add_widget_element_align_class(footer_top,'widget',top_footer_widget_content_align); 

        //main footer
        var main_top                     = $('.cwp-main-footer'),
        main_footer_widget_title_align   =   main_top.data('widget-title'),
        main_footer_widget_content_align =   main_top.data('widget-content');
        add_widget_element_align_class(main_top,'widget-title',main_footer_widget_title_align); 
        add_widget_element_align_class(main_top,'widget',main_footer_widget_content_align); 

        //bottom footer
        var bottom_top                     = $('.cwp-bottom-footer'),
        bottom_footer_widget_title_align   =   bottom_top.data('widget-title'),
        bottom_footer_widget_content_align =   bottom_top.data('widget-content');
        add_widget_element_align_class(bottom_top,'widget-title',bottom_footer_widget_title_align); 
        add_widget_element_align_class(bottom_top,'widget',bottom_footer_widget_content_align);

        footer_sidebar.each(function (){
            var this_footer_sidebar = $(this);
            if ( this_footer_sidebar.hasClass( "cwp-text-left") || this_footer_sidebar.hasClass("cwp-text-right") || this_footer_sidebar.hasClass("cwp-text-center") ) {
                this_footer_sidebar.find('.widget').removeClass("cwp-text-left cwp-text-right cwp-text-center");
                this_footer_sidebar.find('.widget-title').removeClass("cwp-text-left cwp-text-right cwp-text-center");
            }
        });
    });

    function add_widget_element_align_class(widget_wrapper,widget_elemet,align_class){
         widget_wrapper.find('.'+widget_elemet).each(function(){
            $(this).addClass(align_class);
        });
    }

    cwp_window.resize(function () {
        parallaxFooter();
        stickyFooter();
        blogMainGridConvert();
        header_menu_sidebar_toggle();

    });

    cwp_window.on("scroll", function (e) {
        setTimeout(function () {
            stickyMenu();
        }, 300)
    });

    function toggleMenu() {
        $('.main-navigation').slideToggle();
    }
    cwp_body.on('click','.navbar-toggle', function(e){
        toggleMenu();
    });

    //webTicker
    if( typeof $.fn.webTicker !== 'undefined' ){
        $('#webTicker').show().webTicker({
            startEmpty:false,
            hoverpause:true,
            direction: 'left',
            transition: "linear"
        });
    }

    /*Ajax pagination style*/
    var paged = parseInt(cosmoswp.paged) + 1,
        max_num_pages = parseInt(cosmoswp.max_num_pages),
        next_posts = cosmoswp.next_posts;

    cwp_document.on( 'click', '.cwp-ajax-show-more', function( event ) {
        event.preventDefault();
        var show_more = $(this),
            click = show_more.attr('data-click'),
            page = parseInt( show_more.attr('data-number') );

        if( (paged-1) >= max_num_pages){
            show_more.html(cosmoswp.no_more_posts)
        }

        if( click === 0 || (paged-1) >= max_num_pages){
            return false;
        }
        show_more.html('<img src='+cosmoswp.loadMoreGif+' alt=”animated” />');
        show_more.attr("data-click", 0);


        $('#cwp-ajax-temp-post').load(next_posts + ' .cwp-article-ajax', function() {
            /*http://stackoverflow.com/questions/17780515/append-ajax-items-to-masonry-with-infinite-scroll*/
            paged++;/*next page number*/
            next_posts = next_posts.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ paged);
            var cwp_temp_post = $('#cwp-ajax-temp-post'),
                html = cwp_temp_post.html();

            cwp_temp_post.html('');

            // Make jQuery object from HTML string
            var $moreBlocks = $( html ).filter('.cwp-article-ajax');

            // Append new blocks to container
            $('.cwp-blog-grid-row').append($moreBlocks);

            show_more.attr("data-number", page+1);
            show_more.attr("data-click", 1);
            show_more.html(cosmoswp.show_more)
        });
        return false;
    });

    /*auto ajax*/
    if( 'auto-ajax' === cosmoswp.pagination_option ){
        var $content = $('body #cwp-main');
        cwp_window.scroll(function() {
            var content_offset = $content.offset();
            if(
                (cwp_window.scrollTop() + cwp_window.height()) >
                ($content.scrollTop() + $content.height() + content_offset.top)
            ) {
                $(".cwp-ajax-show-more").trigger("click");
            }
        });
    }

    /*Woo Grid List*/
    function cwp_woo_view_switcher() {
        var cwp_woo_view_switcher = $('.cwp-woo-view-switcher'),
            cosmoswp_woo_archive_grid_row = $('.cosmoswp-woo-archive-grid-row');

        cwp_woo_view_switcher.on('click','.cwp-trigger-grid',function(){
            cosmoswp_woo_archive_grid_row.addClass('cwp-grid');
            cosmoswp_woo_archive_grid_row.removeClass('cwp-list');
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

        });

        cwp_woo_view_switcher.on('click','.cwp-trigger-list',function(){
            cosmoswp_woo_archive_grid_row.addClass('cwp-list');
            cosmoswp_woo_archive_grid_row.removeClass('cwp-grid');
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

        });
    }
    cwp_woo_view_switcher();

    /*Edd Grid List*/
    function cwp_edd_view_switcher() {
        var cwp_edd_view_switcher = $('.cwp-edd-view-switcher'),
            cosmoswp_edd_archive_grid_row = $('.cosmoswp-edd-grid-row');

        if(cosmoswp_edd_archive_grid_row.hasClass('cwp-grid')) {
            $('.cwp-trigger-grid').addClass('active');
        }
        cwp_edd_view_switcher.on('click load','.cwp-trigger-grid',function(){
            cosmoswp_edd_archive_grid_row.addClass('cwp-grid');
            cosmoswp_edd_archive_grid_row.removeClass('cwp-list');
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

        });

        cwp_edd_view_switcher.on('click','.cwp-trigger-list',function(){
            cosmoswp_edd_archive_grid_row.addClass('cwp-list');
            cosmoswp_edd_archive_grid_row.removeClass('cwp-grid');
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

        });
    }
    cwp_edd_view_switcher();
    cwp_document.on('change', '#cosmoswp-edd-select-filter', function (event) {
        var orderby = $('#cosmoswp-edd-select-filter').val();
        modified_href = '?sortby=' + orderby;
        modified_href = encodeURI(modified_href);
        window.history.pushState(null, null, modified_href);
        location.reload();
    });
    /*WooCommerce Responsive Primary Sidebar*/
    cwp_document.on('click','.cwc-archive-psp-sm-toggle',function(e){
        e.preventDefault();
        $(cwp_body).toggleClass('cwc-archive-psp-responsive-popup');
    });
    cwp_window.resize(function () {
        if (cwp_window.width() > 767) {
            $(cwp_body).removeClass('cwc-archive-psp-responsive-popup');
        }
    });
});
