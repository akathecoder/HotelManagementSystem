<?php
defined( 'ABSPATH' ) || exit;

/**
 * CosmosWP Intro Admin Page
 *
 * @author  CosmosWP
 * @package CosmosWP
 * @since   1.0.2
 */
/**
 * Class to handle notices and Advanced Demo Import
 *
 * Class CosmosWP_Intro
 */
class CosmosWP_Intro {

    /**
     * current added Menu hook_suffix
     *
     * @since    1.0.0
     * @access   public
     * @var      array    $logs    Store logs and errors.
     */
    private $hook_suffix;
    
    /**
     * Empty Constructor
     */
    public function __construct() {}

    /**
     * Gets an instance of this object.
     * Prevents duplicate instances which avoid artefacts and improves performance.
     *
     * @static
     * @access public
     * @since 1.0.0
     * @return object
     */
    public static function instance() {
        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if ( null === $instance ) {
            $instance = new self();
        }

        // Always return the instance
        return $instance;
    }

    /**
     * Initialize the class
     *
     * 3 Different Process
     */
    public function run() {
        add_action( 'admin_menu', array($this, 'intro') );
        add_action( 'admin_enqueue_scripts', array($this, 'add_scripts') );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function add_scripts( $hook_suffix ) {
        if ( !is_array($this->hook_suffix) || !in_array( $hook_suffix, $this->hook_suffix )){
            return;
        }
        wp_enqueue_style('wpness-grid', COSMOSWP_URL . '/assets/library/wpness-grid/wpness-grid' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), '1.0.0');

        wp_enqueue_style( 'cosmoswp-notice', COSMOSWP_URL. '/inc/admin/notice.css', array(), '1.0.0' );
        wp_enqueue_script( 'cosmoswp-adi-install', COSMOSWP_URL  . '/inc/admin/notice.js', array( 'jquery' ), '', true );

        $translation = array(
            'btn_text' => esc_html__( 'Processing...', 'cosmoswp' ),
            'nonce'    => wp_create_nonce( 'cosmoswp_demo_import_nonce' )
        );
        wp_localize_script( 'cosmoswp-adi-install', 'cosmoswp_adi_install', $translation );
    }

    /**
     * Add admin menus
     * @access public
     */
    public function intro() {
        $this->hook_suffix[] = add_theme_page( esc_html__( 'CosmosWP Intro','cosmoswp' ), esc_html__( 'CosmosWP Intro','cosmoswp' ), 'manage_options', 'cosmoswp-intro', array( $this, 'intro_screen' ) );
    }

    /**
     * parse changelog
     * @access Private
     * @return string
     */
    private function parse_changelog( $content ) {

        $matches   = null;
        $regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
        $changelog = '';

        if ( preg_match( $regexp, $content, $matches ) ) {
            $changes = explode( '\r\n', trim( $matches[1] ) );

            $changelog .= '<pre class="cwp-changelog">';

            foreach ( $changes as $index => $line ) {
                $changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
            }

            $changelog .= '</pre>';
        }

        return wp_kses_post( $changelog );

    }

    /**
     * More Setting/Options array specially for Pro
     * @access Private
     * @return array
     */
    private function more_setting() {
        $more_setting = array(
            array(
                'label' => esc_html__( 'Advanced Banner', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
                ),
            array(
                'label' => esc_html__( 'Advanced Blog', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Blog Pagination', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Dropdown Menu', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Header Sidebar Widgets', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Masonry Blog', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'News Ticker', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Off Canvas Sidebar', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Overlay Search', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Popup Sidebar', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Related Post', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Sticky Footer', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            ),
            array(
                'label' => esc_html__( 'Sticky Sidebar', 'cosmoswp' ),
                'url' => '#',
                'button' => esc_html__( 'View More', 'cosmoswp' )
            )
        );
        return $more_setting;

    }

    /**
     * FAQ Array
     * @access Private
     * @return array
     */
    private function faq() {

        $faq = array(
            array(
                'q' => esc_html__('How to hide/change footer Powered text?','cosmoswp'),
                'a' => sprintf(esc_html__('Please go to %1$sFooter Copyright%2$s option, you can edit copyright text, also remove it completely.', 'cosmoswp'), "<a href='" . add_query_arg( array('autofocus[section]' => 'footer_copyright'), admin_url( 'customize.php' ) ). "' target='_blank'>", '</a>'),
            ),
            array(
                'q' => esc_html__('Does this theme support Gutenberg Blocks?','cosmoswp'),
                'a' => sprintf(esc_html__('Yes, the theme fully supports Gutenberg Blocks. The demo of CosmosWP theme is created primarily on the base of %1$sGutentor: WordPress Page Building Blocks%2$s ', 'cosmoswp'), "<a href='https://www.gutentor.com/' target='_blank'>", '</a>'),

            ),
            array(
                'q' => esc_html__('Does this theme support Page Builder?','cosmoswp'),
                'a' => esc_html__('Yes, CosmosWP theme support all major page builders including Elementor,  Siteorigin, Divi, BeaverBuilder etc.','cosmoswp'),
            ),
            array(
                'q' => esc_html__('What is Gutentor?','cosmoswp'),
                'a' => sprintf(esc_html__('Gutentor is a WordPress plugin based on Gutenberg Blocks, modern drag & drop WordPress page builder Know more about it on %1$sGutentor official website%2$s', 'cosmoswp'), "<a href='https://www.gutentor.com/' target='_blank'>", '</a>'),
            ),
        );
        return  $faq;

    }

    /**
     * Show the plugin recommended screen
     * @access public
     * @return void
     */
    public function intro_screen() {
        ?>
        <div class="cwp-intro">
            <div class="cwp-intro-banner">
                <div class="grid-container">

                    <div class="grid-row">
                        <div class="grid-md-7 grid-lg-7">
                            <div class="cwp-intro-banner-caption">
                                <h2><?php esc_html_e( 'Welcome to CosmosWP', 'cosmoswp' )?></h2>
                                <p>
                                    <?php esc_html_e( 'CosmosWP is now installed and ready to use. If you have further queries, you can always contact us. We hope you enjoy it! CosmosWP comes with dozens of Demo Starter Templates. Install the Advanced Import plugin to get started.', 'cosmoswp' )?>
                                </p>
                                <a href="#" class="cwp-btn cosmoswp-gsm-btn cwp-btn-primary"><?php esc_html_e( 'Get Started', 'cosmoswp' )?></a>
                                <a href="https://www.demo.cosmoswp.com/" class="cwp-btn cwp-btn-white-outline" target="_blank"><?php esc_html_e( 'Visit Starter Templates', 'cosmoswp' )?></a>
                                <?php if( !function_exists('run_cosmoswp_pro')){
                                    $upgrade= '<a href="https://www.cosmoswp.com/pricing/" target="_blank" rel="noopener" class="cwp-btn cwp-btn-sucess">'. esc_html__('Get CosmosWP Pro', 'cosmoswp').'</a>';
                                    echo apply_filters('cosmoswp_intro_upgrade_msg',$upgrade);
                                }?>
                            </div>
                        </div>
                        <div class="grid-md-5 grid-lg-5">
                            <img src="<?php echo esc_url(COSMOSWP_URL.'/assets/img/cosmoswp-welcome-page.png' )?>" alt="<?php esc_html_e( 'CosmosWP', 'cosmoswp' ); ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="cwp-main">
                <div class="grid-container">
                    <div class="grid-row">
                        <div class="grid-md-4 grid-lg-3">
                            <div class="cwp-intro-auth">
                                <div class="cwp-card">
                                    <div class="cwp-intro-profile">
                                        <span>
                                            <img class="cosmoswp-gsm-screenshot" src="<?php echo esc_url(COSMOSWP_URL .'/assets/img/cosmoswp-larger-logo.png' )?>" alt="<?php esc_html_e( 'CosmosWP', 'cosmoswp' ); ?>" />
                                        </span>
                                    </div>
                                    <div class="cwp-intro-profile-info">
                                        <h3><?php esc_html_e( 'CosmosWP', 'cosmoswp' )?></h3>
                                        <a href="https://www.cosmoswp.com/" target="_blank" class="cwp-btn cwp-btn-sucess"><?php esc_html_e( 'Visit Site', 'cosmoswp' )?></a>
                                        <a href="https://www.gutentor.com/" target="_blank" class="cwp-btn cwp-btn-danger"><?php esc_html_e( 'Gutentor', 'cosmoswp' )?></a>
                                    </div>
                                    <div class="cwp-stats" style="display: none">
                                        <ul>
                                            <li>
                                                <h5><?php esc_html_e( 'Installation', 'cosmoswp' )?></h5>
                                                <p><?php esc_html_e( 'Counting...', 'cosmoswp' )?></p>
                                            </li>
                                            <li>
                                                <h5><?php esc_html_e( 'Downloads', 'cosmoswp' )?></h5>
                                                <p><?php esc_html_e( 'Counting...', 'cosmoswp' )?></p>
                                            </li>

                                        </ul>
                                    </div>
                                    
                                </div>
                            
                            </div>

                            <div class="cwp-intro-auth--info">
                                <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"><?php esc_html_e( 'Contact Information', 'cosmoswp' )?></h4>
                                    </div>

                                    <div class="cwp-card-body">

                                        <ul class="cwp-personal-detail">
                                            <li class="">
                                                <span class="dashicons dashicons-smartphone"></span> <b><?php esc_html_e( 'Support:', 'cosmoswp' )?> </b><a href="https://premium.acmeit.org/support-tickets/" target="_blank"><?php esc_html_e( 'Create A Ticket', 'cosmoswp' )?></a>
                                            </li>
                                            <li class="mt-2">
                                                <span class="dashicons dashicons-email-alt"></span>
                                                <b><?php esc_html_e( 'Email:', 'cosmoswp' )?></b><?php esc_html_e( 'supports@cosmoswp.com', 'cosmoswp' )?></li>
                                            <li class="mt-2">
                                                <span class="dashicons dashicons-location"></span>
                                                <b><?php esc_html_e( 'Location:', 'cosmoswp' )?></b><?php esc_html_e( ' Kathmandu, Nepal', 'cosmoswp' )?></li>
                                        </ul>

                                        <ul class="cwp-social">
                                            <li>
                                                <a href="https://www.facebook.com/CosmosWP/" target="_blank">
                                                    <span class="dashicons dashicons-facebook-alt"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/cosmoswptheme" target="_blank">
                                                    <span class="dashicons dashicons-twitter"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-md-8 grid-lg-9 ">
                           <div class="grid-row cwp-info-box">
                               <div class="grid-lg-3 grid-md-6">
                                <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-media-document"></span><?php esc_html_e( 'Knowledge Base', 'cosmoswp' )?></h4>
                                    </div>
                                    <div class="cwp-card-body">
                                      <p>
                                          <?php esc_html_e( 'In-depth and well documented articles will help you to use the CosmosWP Themes in easiest way.', 'cosmoswp' )?>
                                      </p>
                                        <a href="https://www.cosmoswp.com/documentation/" target="_blank" class="cwp-btn cwp-btn-primary">
                                            <?php esc_html_e( 'Visit Knowledge Base', 'cosmoswp' )?>
                                        </a>
                                    </div>
                                </div>
                               </div>
                               <div class="grid-lg-3 grid-md-6">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-format-chat"></span>
                                            <?php esc_html_e( 'Community', 'cosmoswp' )?>
                                        </h4>
                                    </div>
                                    <div class="cwp-card-body">
                                       <p>
                                           <?php esc_html_e( 'We want to make customer experience even better. So, join our Facebook community for instant support from experts.', 'cosmoswp' )?>
                                       </p>
                                        <a href="https://www.facebook.com/groups/552911942158030/" target="_blank" class="cwp-btn cwp-btn-primary">
                                           <?php esc_html_e( 'Join Facebook Group', 'cosmoswp' )?>
                                       </a>
                                    </div>
                                </div>
                               </div>
                               <div class="grid-lg-3 grid-md-6">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-backup"></span> <?php esc_html_e( '24x7 Support', 'cosmoswp' )?> </h4>
                                    </div>
                                    <div class="cwp-card-body">
                                       <p>
                                           <?php esc_html_e( 'We have dedicated support team 24*7 to help you in case you encounter any issue during and after the use of CosmosWP.', 'cosmoswp' )?>
                                       </p>
                                        <a href="https://premium.acmeit.org/support-tickets/" target="_blank" class="cwp-btn cwp-btn-primary"><?php esc_html_e( 'Create A Ticket', 'cosmoswp' )?></a>
                                    </div>
                                </div>
                               </div>
                               <div class="grid-lg-3 grid-md-6">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-video-alt3"></span><?php esc_html_e( 'Video Guide', 'cosmoswp' )?></h4>
                                    </div>
                                    <div class="cwp-card-body">
                                       <p>
                                           <?php esc_html_e( 'CosmosWP Theme comes with detailed video tutorials of each and every customization with practical demonstration.', 'cosmoswp' )?>
                                       </p>
                                       <a href="https://www.cosmoswp.com/" class="cwp-btn cwp-btn-primary" target="_blank" rel="noopener"><?php esc_html_e( 'View Video Guide', 'cosmoswp' )?></a>
                                    </div>
                                </div>
                               </div>
                           </div>
                           <div class="grid-row cwp-info-box cwp-customizer-info">
                                <div class="grid-lg-12 grid-md-12">
                                    <div class="cwp-card">
                                            <div class="cwp-card-header">
                                                <h4 class="cwp-card-heading"><?php esc_html_e( 'Links To Customizer Settings', 'cosmoswp' )?></h4>
                                            </div>
                                            <div class="cwp-card-body">
                                              <ul class="cwp-list">

                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'cosmoswp-general-setting-section'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-editor-textcolor"></span>
                                                          <?php esc_html_e( 'Colors/Fonts', 'cosmoswp' )?>
                                                        </a>
                                                    </li>

                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'title_tagline'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-format-image"></span>
                                                          <?php esc_html_e( 'Upload Logo', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'cosmoswp_header'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-menu-alt3"></span>
                                                          <?php esc_html_e( 'Header Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'cosmoswp_footer'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-tagcloud"></span>
                                                          <?php esc_html_e( 'Footer Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'header_image'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-format-image"></span>
                                                          <?php esc_html_e( 'Banner Section', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $section_link = add_query_arg( array('autofocus[section]' => 'cosmoswp_main_content'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($section_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-tagcloud"></span>
                                                          <?php esc_html_e( 'Content Section', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[section]' => 'cosmoswp-blog'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Blog Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[section]' => 'cosmoswp-page'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Page Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'cosmoswp_post_panel'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-layout"></span>
                                                          <?php esc_html_e( 'Post Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                                  <li class="">
                                                      <?php
                                                      $panel_link = add_query_arg( array('autofocus[panel]' => 'cosmoswp_theme_options'), admin_url( 'customize.php' ) );
                                                      ?>
                                                      <a href="<?php echo esc_url($panel_link);?>" target="_blank">
                                                          <span class="dashicons dashicons-admin-customizer"></span>
                                                          <?php esc_html_e( 'Theme Options', 'cosmoswp' )?>
                                                      </a>
                                                  </li>
                                              </ul>
                                            </div>
                                    </div>
                                </div>
                           </div>

                           <div class="grid-row cwp-info-box">
                               <div class="grid-lg-5 grid-md-5">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-format-image"></span><?php esc_html_e('More Options','cosmoswp');?></h4>
                                    </div>
                                    <div class="cwp-card-body">

                                        <ul class="cwp-table-list">
                                            <?php
                                            $more_setting = $this->more_setting();
                                            foreach ( $more_setting as $key => $setting ){
                                                echo "<li>";
                                                echo "<span>";
                                                echo esc_html($setting['label']);
                                                echo "</span>";
                                                echo "<a href='https://www.cosmoswp.com/pricing/' class='cwp-btn cwp-btn-primary' target='_blank' rel='noopener'>";
                                                echo esc_html($setting['button']);
                                                echo "</a>";
                                                echo "</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                               </div>
                               <div class="grid-lg-7 grid-md-7">
                                   
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-format-image"></span><?php esc_html_e(' Change Log','cosmoswp');?></h4>
                                    </div>
                                    <div class="cwp-card-body">
                                        <div class="cwp-change-log-wrap">
                                            <?php
                                            global $wp_filesystem;

                                            $changelog_file = apply_filters( 'cosmoswp_changelog_file', get_template_directory() . '/readme.txt' );

                                            /*Check if the changelog file exists and is readable.*/
                                            if ( $changelog_file && is_readable( $changelog_file ) ) {
                                                WP_Filesystem();
                                                $changelog      = $wp_filesystem->get_contents( $changelog_file );
                                                $changelog_list = $this->parse_changelog( $changelog );

                                                echo wp_kses_post( $changelog_list );
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                               </div>
                           </div>

                           <div class="grid-row cwp-info-box">
                               <div class="grid-lg-12 grid-md-12">
                                   <div class="cwp-card">
                                    <div class="cwp-card-header">
                                        <h4 class="cwp-card-heading"> <span class="dashicons dashicons-format-image"></span><?php esc_html_e('  Frequently Asked Questions','cosmoswp');?></h4>
                                    </div>
                                    <div class="cwp-card-body">
                                        <div class="cwp-accordion">
                                            <?php
                                            $more_setting = $this->faq();
                                            foreach ( $more_setting as $key => $setting ){
                                                echo "<div class='cwp-card'>";
                                                echo "<div class='cwp-card-header'>";
                                                echo "<h4 class='cwp-card-heading'>";
                                                echo "<a data-toggle='collapse' href='#cwp-intro-faq-".esc_attr($key)."'>";
                                                echo "<span>";
                                                echo esc_html($setting['q']);
                                                echo "</span>";
                                                echo "</a>";
                                                echo "</h4>";
                                                echo "</div>";/*cwp-card-header*/
                                                echo "<div id='cwp-intro-faq-".esc_attr($key)."' class='hidden cwp-card-body-wrap' data-parent='#accordion-default'>";
                                                echo "<div class='cwp-card-body'>";
                                                echo wp_kses_post($setting['a']);
                                                echo "</div>";/*cwp-card-body*/
                                                echo "</div>";/*id*/
                                                echo "</div>";/*cwp-card*/
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Begins execution of the hooks.
 *
 * @since    1.0.0
 */
function cosmoswp_intro( ) {
    return CosmosWP_Intro::instance();
}
cosmoswp_intro()->run();