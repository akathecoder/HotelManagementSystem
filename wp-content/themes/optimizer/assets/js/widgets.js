// JavaScript Document
jQuery(document).ready(function($){
    $('.my_meta_control .color-picker').wpColorPicker();
	

});

jQuery(document).on('panelsopen', function(e) {
	jQuery('.so-panels-dialog-wrapper .so-content .color-picker').wpColorPicker();
});
		
			//REPEATER FIELD OPEN/CLOSE
			function repeatOpen(repeatparent){
				//console.log(repeatparent);
				var hidden = jQuery('#'+repeatparent).parent().find('input:eq(0)').is(":hidden");
				var visible = jQuery('#'+repeatparent).parent().find('input:eq(0)').is(":visible");
				if(hidden){
					jQuery('#'+repeatparent).parent().addClass('repeatopen');	
				}
				if(visible){
					jQuery('#'+repeatparent).parent().removeClass('repeatopen');	
				}
			}
			//COLRPICKER FIELD 
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 2000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
			
			//BLOCK WIDGET ACCORDION
         jQuery(document).on( 'ready widget-updated widget-added', function() {
            jQuery('.block_accordion h4').on('click',function() {
               if(!jQuery(this).parent().hasClass('acc_active')){
                  jQuery(this).parent().addClass('acc_active');
                  jQuery(this).next().slideDown();
               }else{
                  jQuery(this).parent().removeClass('acc_active');
                  jQuery(this).next().slideUp();
               }
            });
         });

jQuery(document).ready(function($) {
    $(".meta_nav a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("tabcurrent");
        $(this).parent().siblings().removeClass("tabcurrent");
        var tab = $(this).attr("href");
        $(".my_meta_control").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

jQuery( document ).on( 'ready widget-added widget-updated', function () {
	
	jQuery(document).on("click", ".remove-field", function(e) {
		jQuery(this).parent().remove();
	});
});

	

//Widget MEDIAPICKER PLUGIN
	 //MEDIA PICKER FUNCTION
	 function mediaPicker(pickerid){
		var custom_uploader;
		var row_id 
        //e.preventDefault();
		row_id = jQuery('#'+pickerid).prev().attr('id');

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
        	custom_uploader.open();
        	return;
        }

        //CREATE THE MEDIA WINDOW
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Insert Images',
            button: {
                text: 'Insert Images'
            },
			type: 'image',
            multiple: false
        });

        //"INSERT MEDIA" ACTION. PREVIEW IMAGE AND INSERT VALUE TO INPUT FIELD
		custom_uploader.on('select', function(){
		var selection = custom_uploader.state().get('selection');
			selection.map( function( attachment ) {
				attachment = attachment.toJSON();
				//INSERT THE SRC IN INPUT FIELD
				jQuery('#' + row_id).val(""+attachment.url+"").trigger('change');
					//APPEND THE PREVIEW IMAGE
					jQuery('#' + row_id).parent().find('.media-picker-preview, .media-picker-remove').remove();
					if(attachment.sizes.medium){
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.sizes.medium.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}else{
						jQuery('#' + row_id).parent().prepend('<img class="media-picker-preview" src="'+attachment.url+'" /><i class="fa fa-times media-picker-remove"></i>');
					}

			});
			jQuery(".media-picker-remove").on('click',function(e) {
				jQuery(this).parent().find('.media-picker').val('').trigger('change');
				jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
			});
		});
        //OPEN THE MEDIA WINDOW
        custom_uploader.open();

    }


jQuery(document).on( 'ready widget-updated widget-added', function() {
	
	//jQuery(".media-picker-remove").unbind( "click" );
	jQuery(".media-picker-remove").on('click',function(e) {
		jQuery(this).parent().find('.media-picker').val('').trigger('change');
		jQuery(this).parent().find('.media-picker-preview, .media-picker-remove').remove();
	});
	
	//jQuery( ".media-picker-button").unbind( "click" );
	 

});



/**
 * WP Editor Widget object
 */
WPEditorWidget = {
	
	/** 
	 * @var string
	 */
	currentContentId: '',
	
	/**
	 * @var string
	 */
	 currentEditorPage: '',
	 
	 /**
	  * @var int
	  */
	 wpFullOverlayOriginalZIndex: 0,

	/**
	 * Show the editor
	 * @param string contentId
	 */
	showEditor: function(contentId) {
		jQuery('#wp-editor-widget-backdrop').show();
		jQuery('body.widgets-php #wp-editor-widget-container, body.post-type-page #wp-editor-widget-container, body.fl-builder #wp-editor-widget-container').show();
		jQuery('body.wp-customizer #wp-editor-widget-container').fadeIn(100).animate({"left":"0"});
		
		this.currentContentId = contentId;
		
		if(jQuery('body').hasClass('wp-customizer')){  
			this.currentEditorPage =  'wp-customizer'; 
		}else if(jQuery('body').hasClass('widgets-php')){
			this.currentEditorPage =  'widgets-php'; 
		}else{  
			this.currentEditorPage =  'wp-pagescreen'; 
		}

		
		if (this.currentEditorPage == "wp-customizer") {
			this.wpFullOverlayOriginalZIndex = parseInt(jQuery('.wp-full-overlay').css('zIndex'));
			jQuery('.wp-full-overlay').css({ zIndex: 49000 });
		}
		
		this.setEditorContent(contentId);
	},
	
	/**
	 * Hide editor
	 */
	hideEditor: function() {
		jQuery('#wp-editor-widget-backdrop').hide();
		jQuery('body.widgets-php #wp-editor-widget-container, body.post-type-page #wp-editor-widget-container, body.fl-builder #wp-editor-widget-container').hide();
		jQuery('body.wp-customizer #wp-editor-widget-container').animate({"left":"-650px"}).fadeOut();
		
		if (this.currentEditorPage == "wp-customizer") {
			jQuery('.wp-full-overlay').css({ zIndex: this.wpFullOverlayOriginalZIndex });
		}
	},
	
	/**
	 * Set editor content
	 */
	setEditorContent: function(contentId) {
		var editor = tinyMCE.EditorManager.get('wpeditorwidget');
		var content = jQuery('#'+ contentId).val();

		if (typeof editor == "object" && editor !== null) {
			editor.setContent(content);
		}
		jQuery('#wpeditorwidget').val(content);
	},
	
	/**
	 * Update widget and close the editor
	 */
	updateWidgetAndCloseEditor: function() {
		
		jQuery('#wpeditorwidget-tmce').trigger('click');
		var editor = tinyMCE.EditorManager.get('wpeditorwidget');

		if (typeof editor == "undefined" || editor == null || editor.isHidden()) {
			var content = jQuery('#wpeditorwidget').val();
		}
		else {
			var content = editor.getContent();
		}

		jQuery('#'+ this.currentContentId).val(content);
		
		// customize.php
		if (this.currentEditorPage == "wp-customizer" &&  jQuery('#'+ this.currentContentId).attr('class') == 'editorfield') {
			var controlid = jQuery('#'+ this.currentContentId).data('customize-setting-link');
			//console.log(controlid);
			setTimeout(function(){
			wp.customize(controlid, function(obj) {
				obj.set(editor.getContent());
			} );
			}, 1000);
			
			
		}else if (this.currentEditorPage == "wp-customizer") {
			var widget_id = jQuery('#'+ this.currentContentId).closest('div.form').find('input.widget-id').val();
			var widget_form_control = wp.customize.Widgets.getWidgetFormControlForWidget( widget_id )
			widget_form_control.updateWidget();
		}
		// If Widgets Edit Page
		else if (this.currentEditorPage == "widgets-php") {
			wpWidgets.save(jQuery('#'+ this.currentContentId).closest('div.widget'), 0, 1, 0);
		}
		
		// If Page builder
		else {
			
			jQuery('#'+ this.currentContentId).closest('div.form').find('input.widget-id').val(editor.getContent());
		}
		
		this.hideEditor();
	}
	
};



jQuery(document).on( 'ready', function() {
if (! jQuery( "body" ).hasClass( "widgets-php" ) ) { return; }
jQuery( function( $ ) {
	
	var sidebarLimits = {"front_sidebar":"6"};

	var realSidebars = $( '#widgets-right div.widgets-sortables' );
	var availableWidgets = $( '#widget-list' ).children( '.widget' );

	var checkLength = function( sidebar, delta ) {
		var sidebarId = sidebar.id;
		if ( undefined === sidebarLimits[sidebarId] ) {
			return;
		}
		
		var widgets = $( sidebar ).sortable( 'toArray' );

		//moving the class up a level and changing the name to be display only
		$( sidebar ).parent().toggleClass( 'sidebar-full-display', sidebarLimits[sidebarId] <= widgets.length + (delta || 0) );
		$( sidebar ).parent().toggleClass( 'sidebar-morethanfull-display', sidebarLimits[sidebarId] < widgets.length + (delta || 0) );

		//still adding the original class to keep the goodness below working properly
		$( sidebar ).toggleClass( 'sidebar-full', sidebarLimits[sidebarId] <= widgets.length + (delta || 0) );

		var notFullSidebars = $( 'div.widgets-sortables' ).not( '.sidebar-full' );

		availableWidgets.draggable( 'option', 'connectToSortable', notFullSidebars );
		realSidebars.sortable( 'option', 'connectWith', notFullSidebars );
	}

	// Check existing sidebars on startup
	realSidebars.map( function() {
		checkLength( this );
	} );

	realSidebars.bind( 'sortreceive sortremove', function( event, ui ) {
		checkLength( this );
	} );

	realSidebars.bind( 'sortstop', function( event, ui ) {
		if ( ui.item.hasClass( 'deleting' ) ) {
			checkLength( this, -1 );
		}
	} );

	$(document).on("click", "a.widget-control-remove", function(e) {
		checkLength( $( this ).closest( 'div.widgets-sortables' )[0], -1 );
	} );

	wpStandardAddWidget = wpWidgets.addWidget;

	wpWidgets.addWidget = function( chooser ) {

		var sidebarId = chooser.find( '.widgets-chooser-selected' ).data('sidebarId'),
			sidebar = $( '#' + sidebarId );

		if( false === sidebar.hasClass('sidebar-full') ) {
			wpStandardAddWidget( chooser );

			realSidebars.map( function() {
				checkLength( this );
			} );
		}
	}
} );

});