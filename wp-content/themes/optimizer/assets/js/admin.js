
/*ADMIN inline MODAL---*/
jQuery(document).ready(function() {
	jQuery('.optimizer_inline_modal').on("click", function(event) {
      event.preventDefault();
      var width = jQuery(this).attr('data-width') ? jQuery(this).attr('data-width')  : '1000px';
      var height = jQuery(this).attr('data-height') ? jQuery(this).attr('data-height')  : '90%';
      var link = jQuery(this).attr('href') ? jQuery(this).attr('href')  : '';
      var popupWindow =  jQuery('<div class="optimizer_inline_window_wrap"><div class="optimizer_inline_window" style="width:'+width+'; height:'+height+'"><div class="optimizer_inline_window__inner"></div></div></div>');
      var popupClose =  jQuery('<div class="optimizer_inline_window__close" onClick="optimizer_remove_inline_modal()">x</a>');
      var popupContent =  jQuery('<iframe frameborder="0" hspace="0" allowtransparency="true" src="'+link+'" style="width:100%; height:100%"></iframe>');
      var popupWindowInner = popupWindow.find('.optimizer_inline_window');
      popupWindowInner.append('<div class="optimizer_inline_window__loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
      popupWindowInner.prepend(popupClose);
      popupWindowInner.append(popupContent);
      jQuery('body').append(popupWindow);
	});
});

function optimizer_remove_inline_modal(){
   jQuery('.optimizer_inline_window_wrap').remove();
}