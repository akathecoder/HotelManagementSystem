// AJAX POST PAGINATION

	jQuery(function() {
		
		jQuery( '.ast_pagenav .page-numbers, #nav-below a, .ast_navigation i' ).on( "click", function(e) {
		e.preventDefault();
		jQuery( this ).siblings().removeClass('current');jQuery( this ).addClass('current');
		
		var pagi = jQuery(this).parentsUntil('.optimposts').parent();
		var ajaxurl = postsq.ajaxurl;
		var layout= pagi.data('post-layout');
		var type= pagi.data('post-type');
		var count= pagi.data('post-count');
		var pages= pagi.data('post-pages');
		var category= pagi.data('post-category');
		var previewbtn= pagi.data('post-previewbtn');
		var linkbtn= pagi.data('post-linkbtn');
		var navigation= pagi.data('post-navigation');
		
		if(navigation =='numbered'){
			var nextpage= jQuery(this).html();
		}
		if(navigation =='infscroll'){
			var nextpage= jQuery(this).parent().parent().data('infinte-next');
		}
		
		if(navigation =='oldnew'){
			var nextpage = jQuery(this).parent().parent().data('query-count');
			//If Next Button is clicked
			if(jQuery(this).hasClass('fa-angle-right')){
				if(nextpage == jQuery(this).parent().parent().data('query-max')){}else{
					var nextpage = nextpage + 1 ;
				}
			}
			//If Previous Button is clicked
			if(jQuery(this).hasClass('fa-angle-left')){
				if(nextpage == 1){}else{
					var nextpage = nextpage -1 ;
				}
			}
		}
		
		var value = jQuery.ajax({
		
			type: "POST",
			url: ajaxurl,
			context: this,
			data:{
				"layout": layout,
				"type": type,
				"count": count,
				"pages": pages,
				"category": category,
				"previewbtn": previewbtn,
				"previewbtn": previewbtn,
				"nextpage": nextpage,
				action: "optimizer_posts"
				}
		
			})
			 .fail(function(r,status,jqXHR) {
				 console.log("failed");
		
			 })
			 .done(function(response,status,jqXHR) {
				//console.log(navigation);
				//console.log(nextpage);
				//console.log(response);
				var ajaxsource = jQuery('<div>' + response + '</div>');
				
				if(navigation =='numbered'){
					jQuery(this).parentsUntil('.optimposts').find('.lay'+layout+'_wrap').html(response);
				}
				if(navigation =='infscroll'){
					var currentpage = jQuery(this).parent().parent().data('infinte-next');
					jQuery(this).parent().parent().data('infinte-next', currentpage + 1)
					if(layout !== '3'){
						var newappend = ajaxsource.find('.lay'+layout+'_wrap_ajax').html();
						jQuery(this).parentsUntil('.optimposts').find('.lay'+layout+'_wrap_ajax').append(newappend);
					}
					var postoucnt = jQuery(this).parentsUntil('.optimposts').find('.lay'+layout+'_wrap_ajax .hentry').length;

					if(postoucnt == jQuery(this).parent().parent().data('infinite-max') ){
						jQuery(this).parent().parent().addClass('infloaded');
					}
				}
				
				if(navigation =='oldnew'){
					jQuery(this).parentsUntil('.optimposts').find('.lay'+layout+'_wrap').html(response);
					jQuery(this).parent().parent().data('query-count', nextpage);
					if(nextpage == jQuery(this).parent().parent().data('query-max')){
						jQuery(this).parent().parent().find('.fa-angle-right').addClass('nav_maxed');
					}else{jQuery(this).parent().parent().find('.fa-angle-right').removeClass('nav_maxed');}
					if(nextpage == 1){
						jQuery(this).parent().parent().find('.fa-angle-left').addClass('nav_maxed');
					}else{jQuery(this).parent().parent().find('.fa-angle-left').removeClass('nav_maxed');}
				}
				
				//Layout1 Animation
				jQuery(".lay1").each(function(index, element) {
					var divs = jQuery(this).find(".hentry");
					for(var i = 0; i < divs.length; i+=3) {
					  divs.slice(i, i+3).wrapAll("<div class='ast_row'></div>");
					}
					if (jQuery(window).width() < 1200) {
						var flaywidth = jQuery(this).find(".hentry").width();
						jQuery(this).find('.post_image').css({"maxHeight":(flaywidth * 66)/100});
					}
				});
				
	jQuery('.lay1.optimposts, .lay2.optimposts, .lay4.optimposts').each(function(index, element) {  jQuery(this).waitForImages(function() { jQuery(this).find('.type-product').matchHeight({ property: 'min-height'});  }); });
	jQuery('.lay1.optimposts .type-product').each(function(index, element) {
		jQuery(this).find('.button.add_to_cart_button').prependTo(jQuery(this).find('.imgwrap'));
		jQuery(this).find('span.price').prependTo(jQuery(this).find('.post_image '));
    });
				
				//FrontPage Post Image Zoom	
				jQuery(".imgzoom[href$='.jpg'], .imgzoom[href$='.png'], .imgzoom[href$='.gif']").magnificPopup({type:'image',image: {titleSrc: 'data-title'}});
				

				
			 });
		
		});	
	});	
	