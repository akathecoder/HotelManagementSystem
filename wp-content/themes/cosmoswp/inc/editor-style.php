<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * CosmosWP_Editor_Style
 *
 * @package CosmosWP
 */
if ( ! class_exists( 'CosmosWP_Editor_Style' ) ) :

	class CosmosWP_Editor_Style {

		/**
		 * Main Instance
		 *
		 * Insures that only one instance of CosmosWP_Editor_Style exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return object
		 */
		public static function instance() {

			// Store the instance locally to avoid private static replication
			static $instance = null;

			// Only run these methods if they haven't been ran previously
			if ( null === $instance ) {
				$instance = new CosmosWP_Editor_Style;
			}

			// Always return the instance
			return $instance;
		}

		/**
		 *  Run functionality with hooks
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return void
		 */
		public function run() {
			add_action( 'enqueue_block_editor_assets', array( $this, 'add_editor_dynamic_styles' ) );
			add_action( 'after_setup_theme', array( $this, 'add_editor_styles' ) );
		}

		public function dynamic_css(){
			/**
			 * General Setting Dynamic CSS
			 */
			$general_setting_dynamic_css['all']     = '';
			$general_setting_dynamic_css['tablet']  = '';
			$general_setting_dynamic_css['desktop'] = '';
			/*general setting */
			$general_typography_body        = cosmoswp_get_theme_options('general-setting-body-p-typography');
			$general_typography_body        = json_decode($general_typography_body,true);

			$general_typography_h1          = cosmoswp_get_theme_options('general-setting-h1-typography');
			$general_typography_h1          = json_decode($general_typography_h1,true);

			$general_typography_h2          = cosmoswp_get_theme_options('general-setting-h2-typography');
			$general_typography_h2          = json_decode($general_typography_h2,true);

			$general_typography_h3          = cosmoswp_get_theme_options('general-setting-h3-typography');
			$general_typography_h3          = json_decode($general_typography_h3,true);

			$general_typography_h4          = cosmoswp_get_theme_options('general-setting-h4-typography');
			$general_typography_h4          = json_decode($general_typography_h4,true);

			$general_typography_h5          = cosmoswp_get_theme_options('general-setting-h5-typography');
			$general_typography_h5          = json_decode($general_typography_h5,true);

			$general_typography_h6          = cosmoswp_get_theme_options('general-setting-h6-typography');
			$general_typography_h6          = json_decode($general_typography_h6,true);

			$general_setting_body_css         = '';
			$general_setting_body_tablet_css  = '';
			$general_setting_body_desktop_css = '';

			$general_setting_color = cosmoswp_get_theme_options('general-setting-color-options');
			$general_setting_color = json_decode($general_setting_color,true);

			/* site text color */
			$site_text_color       = cosmoswp_ifset($general_setting_color['text-color']);
			if ( $site_text_color ){
				$general_setting_body_css		.= 'color:'.$site_text_color.';';
			}

			$body_font_family     =  cosmoswp_font_family($general_typography_body);
			if ( $body_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_body );

				$general_setting_body_css .=  '
		font-family    :'.$body_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_body['font-style'].';
		text-decoration:'.$general_typography_body['text-decoration'].'; 
		text-transform :'.$general_typography_body['text-transform'].'; 
	';
				/* mobile typography property */
				$body_mobile_font_size       = cosmoswp_ifset($general_typography_body['font-size']['mobile']);
				if ( $body_mobile_font_size ){
					$general_setting_body_css .=  'font-size:'.$body_mobile_font_size.'px;';
				}
				$body_mobile_line_height       = cosmoswp_ifset($general_typography_body['line-height']['mobile']);
				if ( $body_mobile_line_height ){
					$general_setting_body_css .=  'line-height:'.$body_mobile_line_height.'px;';
				}
				$body_mobile_letter_spacing       = cosmoswp_ifset($general_typography_body['letter-spacing']['mobile']);
				if ( $body_mobile_letter_spacing ){
					$general_setting_body_css .=  'letter-spacing:'.$body_mobile_letter_spacing.'px;';
				}

				/* tablet typography property */
				$body_tablet_font_size       = cosmoswp_ifset($general_typography_body['font-size']['tablet']);
				if ( $body_tablet_font_size ){
					$general_setting_body_tablet_css .=  'font-size:'.$body_tablet_font_size.'px;';
				}
				$body_tablet_line_height       = cosmoswp_ifset($general_typography_body['line-height']['tablet']);
				if ( $body_tablet_line_height ){
					$general_setting_body_tablet_css .=  'line-height:'.$body_tablet_line_height.'px;';
				}
				$body_tablet_letter_spacing       = cosmoswp_ifset($general_typography_body['letter-spacing']['tablet']);
				if ( $body_tablet_letter_spacing ){
					$general_setting_body_tablet_css .=  'letter-spacing:'.$body_tablet_letter_spacing.'px;';
				}

				/* tablet typography property */
				$body_desktop_font_size       = cosmoswp_ifset($general_typography_body['font-size']['desktop']);
				if ( $body_desktop_font_size ){
					$general_setting_body_desktop_css .=  'font-size:'.$body_desktop_font_size.'px;';
				}
				$body_desktop_line_height       = cosmoswp_ifset($general_typography_body['line-height']['desktop']);
				if ( $body_desktop_line_height ){
					$general_setting_body_desktop_css .=  'line-height:'.$body_desktop_line_height.'px;';
				}
				$body_desktop_letter_spacing       = cosmoswp_ifset($general_typography_body['letter-spacing']['desktop']);
				if ( $body_desktop_letter_spacing ){
					$general_setting_body_desktop_css .=  'letter-spacing:'.$body_desktop_letter_spacing.'px;';
				}
			}

			/* Adding mobile body css in dynamic css hook */
			if ( !empty( $general_setting_body_css ) ){
				$general_setting_body_dynamic_css               = '.editor-writing-flow{
		'.$general_setting_body_css.'
	}';
				$general_setting_dynamic_css['all']      .= $general_setting_body_dynamic_css;
			}

			/* Adding tablet body css in dynamic css hook */
			if ( !empty( $general_setting_body_tablet_css ) ){
				$general_setting_body_tablet_dynamic_css               = '.editor-writing-flow{
		'.$general_setting_body_tablet_css.'
	}';
				$general_setting_dynamic_css['tablet']      .= $general_setting_body_tablet_dynamic_css;
			}

			/* Adding desktop body css in dynamic css hook */
			if ( !empty( $general_setting_body_desktop_css ) ){
				$general_setting_body_desktop_dynamic_css               = '.editor-writing-flow{
		'.$general_setting_body_desktop_css.'
	}';
				$general_setting_dynamic_css['desktop']      .= $general_setting_body_desktop_dynamic_css;
			}

			/* site title color */
			$site_title_color       = cosmoswp_ifset($general_setting_color['title-color']);
			if ( $site_title_color ){
				$general_setting_dynamic_css['all']      .= '.editor-writing-flow h1,
	.editor-writing-flow h1 a,
	.editor-writing-flow h2,
	.editor-writing-flow h2 a,
	.editor-writing-flow h3,
	.editor-writing-flow h3 a,
	.editor-writing-flow h4,
	.editor-writing-flow h4 a,
	.editor-writing-flow h5,
	.editor-writing-flow h5 a,
	.editor-writing-flow h6,
	.editor-writing-flow h6 a{
		color:'.$site_title_color.';
	}';
			}

			/* link color */
			$site_link_color       = cosmoswp_ifset($general_setting_color['link-color']);
			if ( $site_link_color ){
				$general_setting_dynamic_css['all']      .= '.editor-writing-flow a{
		color:'.$site_link_color.';
	}';
			}

			/* site link hover color */
			$site_link_hover_color       = cosmoswp_ifset($general_setting_color['link-hover-color']);
			if ( $site_link_hover_color ){
				$general_setting_dynamic_css['all']      .= '
	.editor-writing-flow a:hover{
		color:'.$site_link_hover_color.';
	}';
			}

			/* Entry primary color */
			$primary_color       = cosmoswp_ifset($general_setting_color['primary-color']);

			$general_setting_css         = '';
			$general_setting_tablet_css  = '';
			$general_setting_desktop_css = '';
			$h1_font_family     =  cosmoswp_font_family($general_typography_h1);
			if ( $h1_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h1 );

				$general_setting_css .=  '.editor-writing-flow h1, 
	.editor-writing-flow h1 a{
		font-family    :'.$h1_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h1['font-style'].';
		text-decoration:'.$general_typography_h1['text-decoration'].'; 
		text-transform :'.$general_typography_h1['text-transform'].'; 
		font-size      :'.$general_typography_h1['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h1['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h1['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h1_tablet_css             = '';
				$h1_tablet_font_size       = cosmoswp_ifset($general_typography_h1['font-size']['tablet']);
				if ( $h1_tablet_font_size ){
					$h1_tablet_css .=  'font-size:'.$h1_tablet_font_size.'px;';
				}
				$h1_tablet_line_height       = cosmoswp_ifset($general_typography_h1['line-height']['tablet']);
				if ( $h1_tablet_line_height ){
					$h1_tablet_css .=  'line-height:'.$h1_tablet_line_height.'px;';
				}
				$h1_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h1['letter-spacing']['tablet']);
				if ( $h1_tablet_letter_spacing ){
					$h1_tablet_css .=  'letter-spacing:'.$h1_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  'h1, h1 a{'.$h1_tablet_css.'}';



				/* desktop typography property */
				$h1_desktop_css              = '';
				$h1_desktop_font_size       = cosmoswp_ifset($general_typography_h1['font-size']['desktop']);
				if ( $h1_desktop_font_size ){
					$h1_desktop_css .=  'font-size:'.$h1_desktop_font_size.'px;';
				}
				$h1_desktop_line_height       = cosmoswp_ifset($general_typography_h1['line-height']['desktop']);
				if ( $h1_desktop_line_height ){
					$h1_desktop_css .=  'line-height:'.$h1_desktop_line_height.'px;';
				}
				$h1_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h1['letter-spacing']['desktop']);
				if ( $h1_desktop_letter_spacing ){
					$h1_desktop_css .=  'letter-spacing:'.$h1_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  'h1, h1 a{'.$h1_desktop_css.'}';

			}

			$h2_font_family     =  cosmoswp_font_family($general_typography_h2);
			if ( $h2_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h2 );

				$general_setting_css .=  '.editor-writing-flow h2, 
	.editor-writing-flow h2 a{
		font-family    :'.$h2_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h2['font-style'].';
		text-decoration:'.$general_typography_h2['text-decoration'].'; 
		text-transform :'.$general_typography_h2['text-transform'].'; 
		font-size      :'.$general_typography_h2['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h2['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h2['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h2_tablet_css             = '';
				$h2_tablet_font_size       = cosmoswp_ifset($general_typography_h2['font-size']['tablet']);
				if ( $h2_tablet_font_size ){
					$h2_tablet_css .=  'font-size:'.$h2_tablet_font_size.'px;';
				}
				$h2_tablet_line_height       = cosmoswp_ifset($general_typography_h2['line-height']['tablet']);
				if ( $h2_tablet_line_height ){
					$h2_tablet_css .=  'line-height:'.$h2_tablet_line_height.'px;';
				}
				$h2_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h2['letter-spacing']['tablet']);
				if ( $h2_tablet_letter_spacing ){
					$h2_tablet_css .=  'letter-spacing:'.$h2_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  'h2, h2 a{'.$h2_tablet_css.'}';



				/* desktop typography property */
				$h2_desktop_css              = '';
				$h2_desktop_font_size       = cosmoswp_ifset($general_typography_h2['font-size']['desktop']);
				if ( $h2_desktop_font_size ){
					$h2_desktop_css .=  'font-size:'.$h2_desktop_font_size.'px;';
				}
				$h2_desktop_line_height       = cosmoswp_ifset($general_typography_h2['line-height']['desktop']);
				if ( $h2_desktop_line_height ){
					$h2_desktop_css .=  'line-height:'.$h2_desktop_line_height.'px;';
				}
				$h2_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h2['letter-spacing']['desktop']);
				if ( $h2_desktop_letter_spacing ){
					$h2_desktop_css .=  'letter-spacing:'.$h2_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  'h2, h2 a{'.$h2_desktop_css.'}';
			}
			$h3_font_family     =  cosmoswp_font_family($general_typography_h3);
			if ( $h3_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h3 );

				$general_setting_css .=  '.editor-writing-flow h3, 
	.editor-writing-flow h3 a{
		font-family    :'.$h3_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h3['font-style'].';
		text-decoration:'.$general_typography_h3['text-decoration'].'; 
		text-transform :'.$general_typography_h3['text-transform'].'; 
		font-size      :'.$general_typography_h3['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h3['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h3['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h3_tablet_css             = '';
				$h3_tablet_font_size       = cosmoswp_ifset($general_typography_h3['font-size']['tablet']);
				if ( $h3_tablet_font_size ){
					$h3_tablet_css .=  'font-size:'.$h3_tablet_font_size.'px;';
				}
				$h3_tablet_line_height       = cosmoswp_ifset($general_typography_h3['line-height']['tablet']);
				if ( $h3_tablet_line_height ){
					$h3_tablet_css .=  'line-height:'.$h3_tablet_line_height.'px;';
				}
				$h3_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h3['letter-spacing']['tablet']);
				if ( $h3_tablet_letter_spacing ){
					$h3_tablet_css .=  'letter-spacing:'.$h3_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  '.editor-writing-flow h3,.editor-writing-flow h3 a{'.$h3_tablet_css.'}';



				/* desktop typography property */
				$h3_desktop_css              = '';
				$h3_desktop_font_size       = cosmoswp_ifset($general_typography_h3['font-size']['desktop']);
				if ( $h3_desktop_font_size ){
					$h3_desktop_css .=  'font-size:'.$h3_desktop_font_size.'px;';
				}
				$h3_desktop_line_height       = cosmoswp_ifset($general_typography_h3['line-height']['desktop']);
				if ( $h3_desktop_line_height ){
					$h3_desktop_css .=  'line-height:'.$h3_desktop_line_height.'px;';
				}
				$h3_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h3['letter-spacing']['desktop']);
				if ( $h3_desktop_letter_spacing ){
					$h3_desktop_css .=  'letter-spacing:'.$h3_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  '.editor-writing-flow h3, .editor-writing-flow h3 a{'.$h3_desktop_css.'}';
			}

			$h4_font_family     =  cosmoswp_font_family($general_typography_h4);
			if ( $h4_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h4 );

				$general_setting_css .=  '.editor-writing-flow h4, 
	.editor-writing-flow h4 a{
		font-family    :'.$h4_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h4['font-style'].';
		text-decoration:'.$general_typography_h4['text-decoration'].'; 
		text-transform :'.$general_typography_h4['text-transform'].'; 
		font-size      :'.$general_typography_h4['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h4['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h4['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h4_tablet_css             = '';
				$h4_tablet_font_size       = cosmoswp_ifset($general_typography_h4['font-size']['tablet']);
				if ( $h4_tablet_font_size ){
					$h4_tablet_css .=  'font-size:'.$h4_tablet_font_size.'px;';
				}
				$h4_tablet_line_height       = cosmoswp_ifset($general_typography_h4['line-height']['tablet']);
				if ( $h4_tablet_line_height ){
					$h4_tablet_css .=  'line-height:'.$h4_tablet_line_height.'px;';
				}
				$h4_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h4['letter-spacing']['tablet']);
				if ( $h4_tablet_letter_spacing ){
					$h4_tablet_css .=  'letter-spacing:'.$h4_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  '.editor-writing-flow h4, .editor-writing-flow h4 a{'.$h4_tablet_css.'}';

				/* desktop typography property */
				$h4_desktop_css              = '';
				$h4_desktop_font_size       = cosmoswp_ifset($general_typography_h4['font-size']['desktop']);
				if ( $h4_desktop_font_size ){
					$h4_desktop_css .=  'font-size:'.$h4_desktop_font_size.'px;';
				}
				$h4_desktop_line_height       = cosmoswp_ifset($general_typography_h4['line-height']['desktop']);
				if ( $h4_desktop_line_height ){
					$h4_desktop_css .=  'line-height:'.$h4_desktop_line_height.'px;';
				}
				$h4_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h4['letter-spacing']['desktop']);
				if ( $h4_desktop_letter_spacing ){
					$h4_desktop_css .=  'letter-spacing:'.$h4_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  '.editor-writing-flow h4, .editor-writing-flow h4 a{'.$h4_desktop_css.'}';
			}

			$h5_font_family     =  cosmoswp_font_family($general_typography_h5);
			if ( $h5_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h5 );

				$general_setting_css .=  '.editor-writing-flow h5, 
	.editor-writing-flow h5 a{
		font-family    :'.$h5_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h5['font-style'].';
		text-decoration:'.$general_typography_h5['text-decoration'].'; 
		text-transform :'.$general_typography_h5['text-transform'].'; 
		font-size      :'.$general_typography_h5['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h5['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h5['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h5_tablet_css             = '';
				$h5_tablet_font_size       = cosmoswp_ifset($general_typography_h5['font-size']['tablet']);
				if ( $h5_tablet_font_size ){
					$h5_tablet_css .=  'font-size:'.$h5_tablet_font_size.'px;';
				}
				$h5_tablet_line_height       = cosmoswp_ifset($general_typography_h5['line-height']['tablet']);
				if ( $h5_tablet_line_height ){
					$h5_tablet_css .=  'line-height:'.$h5_tablet_line_height.'px;';
				}
				$h5_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h5['letter-spacing']['tablet']);
				if ( $h5_tablet_letter_spacing ){
					$h5_tablet_css .=  'letter-spacing:'.$h5_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  '.editor-writing-flow h5, .editor-writing-flow h5 a{'.$h5_tablet_css.'}';

				/* desktop typography property */
				$h5_desktop_css              = '';
				$h5_desktop_font_size       = cosmoswp_ifset($general_typography_h5['font-size']['desktop']);
				if ( $h5_desktop_font_size ){
					$h5_desktop_css .=  'font-size:'.$h5_desktop_font_size.'px;';
				}
				$h5_desktop_line_height       = cosmoswp_ifset($general_typography_h5['line-height']['desktop']);
				if ( $h5_desktop_line_height ){
					$h5_desktop_css .=  'line-height:'.$h5_desktop_line_height.'px;';
				}
				$h5_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h5['letter-spacing']['desktop']);
				if ( $h5_desktop_letter_spacing ){
					$h5_desktop_css .=  'letter-spacing:'.$h5_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  '.editor-writing-flow h5, .editor-writing-flow h5 a{'.$h5_desktop_css.'}';
			}
			$h6_font_family     =  cosmoswp_font_family($general_typography_h6);
			if ( $h6_font_family ){
				$font_weight     = cosmoswp_font_weight( $general_typography_h6 );

				$general_setting_css .=  '.editor-writing-flow h6, 
	.editor-writing-flow h6 a{
		font-family    :'.$h6_font_family.';
		font-weight    :'.$font_weight.'; 
		font-style     :'.$general_typography_h6['font-style'].';
		text-decoration:'.$general_typography_h6['text-decoration'].'; 
		text-transform :'.$general_typography_h6['text-transform'].'; 
		font-size      :'.$general_typography_h6['font-size']['mobile'].'px;
		line-height    :'.$general_typography_h6['line-height']['mobile'].'px;
		letter-spacing :'.$general_typography_h6['letter-spacing']['mobile'].'px; 
	}';

				/* tablet typography property */
				$h6_tablet_css             = '';
				$h6_tablet_font_size       = cosmoswp_ifset($general_typography_h6['font-size']['tablet']);
				if ( $h6_tablet_font_size ){
					$h6_tablet_css .=  'font-size:'.$h6_tablet_font_size.'px;';
				}
				$h6_tablet_line_height       = cosmoswp_ifset($general_typography_h6['line-height']['tablet']);
				if ( $h6_tablet_line_height ){
					$h6_tablet_css .=  'line-height:'.$h6_tablet_line_height.'px;';
				}
				$h6_tablet_letter_spacing       = cosmoswp_ifset($general_typography_h6['letter-spacing']['tablet']);
				if ( $h6_tablet_letter_spacing ){
					$h6_tablet_css .=  'letter-spacing:'.$h6_tablet_letter_spacing.'px;';
				}
				$general_setting_tablet_css .=  '.editor-writing-flow h6, .editor-writing-flow h6 a{'.$h6_tablet_css.'}';


				/* desktop typography property */
				$h6_desktop_css              = '';
				$h6_desktop_font_size       = cosmoswp_ifset($general_typography_h6['font-size']['desktop']);
				if ( $h6_desktop_font_size ){
					$h6_desktop_css .=  'font-size:'.$h6_desktop_font_size.'px;';
				}
				$h6_desktop_line_height       = cosmoswp_ifset($general_typography_h6['line-height']['desktop']);
				if ( $h6_desktop_line_height ){
					$h6_desktop_css .=  'line-height:'.$h6_desktop_line_height.'px;';
				}
				$h6_desktop_letter_spacing       = cosmoswp_ifset($general_typography_h6['letter-spacing']['desktop']);
				if ( $h6_desktop_letter_spacing ){
					$h6_desktop_css .=  'letter-spacing:'.$h6_desktop_letter_spacing.'px;';
				}
				$general_setting_desktop_css .=  '.editor-writing-flow h6, .editor-writing-flow h6 a{'.$h6_desktop_css.'}';
			}

			/**
			 * Responsive H1 to H6 typography
			 */
			$general_setting_dynamic_css['all']     .= $general_setting_css;
			$general_setting_dynamic_css['tablet']  .= $general_setting_tablet_css;
			$general_setting_dynamic_css['desktop'] .= $general_setting_desktop_css;

			return $general_setting_dynamic_css;
		}

		/**
		 *  Call back function for cosmoswp_column_elements
		 *  Change Post/Page builder layout
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return void
		 */
		public function add_editor_dynamic_styles(){
			$getCSS      = '';
			$dynamic_css = $this->dynamic_css();

			if (is_array($dynamic_css)) {
				foreach ($dynamic_css as $screen => $css) {
					if ($screen == "all") {

						if (is_array($css)) {
							$getCSS .= implode(" ", $css);
						} else {
							$getCSS .= $css;
						}
					}
					elseif ($screen == "tablet") {

						$getCSS .= '@media (min-width: 720px) {';
						if (is_array($css)) {
							$getCSS .= implode(" ", $css);
						} else {
							$getCSS .= $css;
						}
						$getCSS .= "}";
					}
					elseif ($screen == "desktop") {

						$getCSS .= '@media (min-width: 992px) {';
						if (is_array($css)) {
							$getCSS .= implode(" ", $css);
						} else {
							$getCSS .= $css;
						}
						$getCSS .= "}";
					}
				}
			}
			$output = cosmoswp_dynamic_css()->minify_css( $getCSS );
			$styles = $output;
            wp_add_inline_style( 'cosmmoswp-block-google-fonts', $styles );
		}

        /**
         *  Call back function for cosmoswp_column_elements
         *  Change Post/Page builder layout
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function add_editor_styles(){
            // For the Block Editor.
            $font_url = cosmoswp_typography_fonts()->get_google_font_url();
            if ($font_url) {
                add_editor_style( $font_url);
            }
        }
	}

endif;

/**
 * Create Instance for CosmosWP_Editor_Style
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 *
 * @return object
 */
if ( ! function_exists( 'cosmoswp_editor_style' ) ) {

	function cosmoswp_editor_style() {

		return CosmosWP_Editor_Style::instance();
	}

	cosmoswp_editor_style()->run();
}