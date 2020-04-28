/**
 * CosmosWp Admin JS
 */
 jQuery(document).ready(function($){
     var cwp_document = $(document);

     /*banner image meta*/
     cwp_document.on('click','.cwp-media-image-upload', function(e){
         // Prevents the default action from occuring.
         e.preventDefault();

         var media_title = $(this).data('title'),
             media_button = $(this).data('button'),
             media_input_val = $(this).prev(),
             media_image_url = $(this).siblings('.cwp-image-preview-wrap');

         meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
             title: media_title,
             button: { text:  media_button },
             library: {type: 'image'},
         });

         // Opens the media library frame.
         meta_image_frame.open();

         // Runs when an video is selected.
         meta_image_frame.on('select', function(){
             // Grabs the attachment selection and creates a JSON representation of the model.
             var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

             // Sends the attachment ID/URL to our custom video input field.
             media_input_val.val(media_attachment.id);
             var image = $('<img />', {
                 src: media_attachment.url,
             });
             media_image_url.html(image);

             media_image_url.show();
             media_input_val.trigger('change');
         });


     });
     // Runs when the video remove button is clicked.
     cwp_document.on('click','.cwp-media-image-remove', function(e){
         $(this).siblings('.cwp-image-preview-wrap').html('');
         $(this).prev().prev().val('');
     });

     /*Video Meta*/
     cwp_document.on('click','.cwp-media-video-upload', function(e){

         // Prevents the default action from occuring.
         e.preventDefault();

         var media_title = $(this).data('title'),
             media_button = $(this).data('button'),
             media_input_val = $(this).prev(),
             media_image_url = $(this).siblings('.cwp-video-preview-wrap');

         meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
             title: media_title,
             button: { text:  media_button },
             library: {type: 'video/MP4'},
         });
         // Opens the media library frame.
         meta_image_frame.open();

         // Runs when an video is selected.
         meta_image_frame.on('select', function(){
             // Grabs the attachment selection and creates a JSON representation of the model.
             var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
             console.log(media_attachment);

             // Sends the attachment ID/URL to our custom video input field.
             media_input_val.val(media_attachment.id);
             var video = $('<video />', {
                 id: 'video',
                 src: media_attachment.url,
                 type: 'video/mp4',
                 controls: true
             });
             media_image_url.html(video);

             media_image_url.show();
             media_input_val.trigger('change');
         });
     });
     // Runs when the video remove button is clicked.
     cwp_document.on('click','.cwp-media-video-remove', function(e){
         $(this).siblings('.cwp-video-preview-wrap').html('');
         $(this).prev().prev().val('');
     });

     /*banner selection*/
     $('#cosmoswp_banner_options_layout').change(function() {
         var selected_val            = $(this).find(":selected").val(),
             custom_banner_options       = $('.cosmoswp-custom-banner-options'),
             custom_banner_option_items  = $('.cosmoswp-custom-banner-item');

         if(selected_val === 'custom'){
             custom_banner_options.show();
             custom_banner_option_items.show();
         }
         else{
             custom_banner_options.hide();
             custom_banner_option_items.hide();
         }
     }).trigger("change");

     /*Custom banner Selection*/
     $('#cosmoswp_custom_banner_layout_options').change(function(){
         var selected_val             = $(this).find(":selected").val(),
             cosmos_banner_img_wrap   = $('.cosmoswp-banner-img-wrap'),
             cosmos_banner_color_wrap = $('.cosmoswp-banner-color-wrap'),
             cosmos_banner_video_wrap = $('.cosmoswp-banner-video-wrap');

         if(selected_val === 'normal-image' || selected_val === 'bg-image' ){
             cosmos_banner_img_wrap.show();
             cosmos_banner_img_wrap.siblings().hide();
         }
         else if(selected_val === 'color' ){
             cosmos_banner_color_wrap.show();
             cosmos_banner_color_wrap.siblings().hide();
         }
         else if(selected_val === 'video' ){
             cosmos_banner_video_wrap.show();
             cosmos_banner_video_wrap.siblings().hide();
         }
     }).trigger("change");
});