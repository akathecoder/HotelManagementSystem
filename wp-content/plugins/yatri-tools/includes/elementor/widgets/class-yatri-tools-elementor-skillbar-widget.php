<?php
/**
 * Skillbar Module
 */

namespace Yatri_Tools_Elementor\Widgets;
use Elementor\Widget_Base;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Typography as Group_Control_Typography;




// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Yatri_Tools_Elementor_Skillbar_Widget extends Widget_Base {

	public function get_name() {
		return 'yte-skillbar';
	}

	public function get_title() {
		return __( 'Skillbar', 'yatri-tools' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ YATRI_TOOLS_ELEMENTOR_CATEGORY ];
	}

	public function get_script_depends() {
		return [ 'yte-skillbar', 'appear' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_alert',
			[
				'label' 		=> __( 'Yatri Skillbar', 'yatri-tools' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' 		=> __( 'Title', 'yatri-tools' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Web Design', 'yatri-tools' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'percent',
			[
				'label' 		=> __( 'Percentage', 'yatri-tools' ),
				'type' 			=> Controls_Manager::SLIDER,
				'default' 		=> [
					'size' 		=> 85,
					'unit' 		=> '%',
				],
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'display_percent',
			[
				'label' 		=> __( 'Display % Number', 'yatri-tools' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'true',
				'options' 		=> [
					'true' 		=> __( 'Show', 'yatri-tools' ),
					'false' 	=> __( 'Hide', 'yatri-tools' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label' 		=> __( 'Style', 'yatri-tools' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'outside',
				'options' 		=> [
					'inner' 	=> __( 'Inner', 'yatri-tools' ),
					'outside' 	=> __( 'Outside', 'yatri-tools' ),
				],
			]
		);

		$this->add_control(
			'display_stripe',
			[
				'label' 		=> __( 'Display Stripe', 'yatri-tools' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'true',
				'options' 		=> [
					'true' 		=> __( 'Show', 'yatri-tools' ),
					'false' 	=> __( 'Hide', 'yatri-tools' ),
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' 		=> __( 'View', 'yatri-tools' ),
				'type' 			=> Controls_Manager::HIDDEN,
				'default' 		=> 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' 		=> __( 'Skill Bar', 'yatri-tools' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background',
			[
				'label' 		=> __( 'Background', 'yatri-tools' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .yte-skillbar-container' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color',
			[
				'label' 		=> __( 'Bar Color', 'yatri-tools' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .yte-skillbar-bar' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_shadow',
			[
				'label' 		=> __( 'Inset Shadow', 'yatri-tools' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'true',
				'options' 		=> [
					'true' 		=> __( 'Yes', 'yatri-tools' ),
					'false' 	=> __( 'No', 'yatri-tools' ),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'skillbar_title',
				'selector' 		=> '{{WRAPPER}} .yte-skillbar',
				'scheme' 		=> Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		// Vars
		$elements_style = $settings['style'];
		$percent 		= $settings['percent']['size'];
		$title 			= $settings['title'];
		$show_percent 	= $settings['display_percent'];
		$show_stripe 	= $settings['display_stripe'];

		// Wrapper classes
		$wrap_classes = array( 'yte-skillbar', 'clr' );
		if ( 'false' == $settings['box_shadow'] ) {
			$wrap_classes[] = 'disable-box-shadow';
		}
		if ( $elements_style ) {
			$wrap_classes[] = 'style-' . $elements_style;
		}
		if ( 'inner' == $elements_style ) {
		   $wrap_classes[] = 'yte-skillbar-container';
		}

		// Turn wrap classes into a string
		$wrap_classes = implode( ' ', $wrap_classes ); ?>

		<div class="<?php echo esc_attr( $wrap_classes ); ?>" data-percent="<?php echo esc_attr( $percent ); ?>&#37;">

			<?php if ( 'inner' == $elements_style ) { ?>

				<div class="yte-skillbar-title">

					<div class="yte-skillbar-title-inner">
						<?php echo esc_attr( $title ); ?>
					</div><!-- .yte-skillbar-title-inner -->

				</div><!-- .yte-skillbar-title -->

			<?php } else if ( 'outside' == $elements_style ) { ?>

				<div class="yte-skillbar-title">
					<?php echo esc_attr( $title ); ?>
				</div><!-- .yte-skillbar-title-inner -->

				<?php if ( 'true' == $show_percent ) { ?>
					<div class="yte-skill-bar-percent"><?php echo esc_attr( $percent ); ?>&#37;</div>
				<?php } ?>

				<div style="clear:both"></div>

			<?php } ?>

			<?php if ( $settings['percent'] ) { ?>

				<?php if ( 'outside' == $elements_style ) { ?>
					<div class="yte-skillbar-container clr">
				<?php } ?>

					<div class="yte-skillbar-bar">
						<?php if ( 'true' == $show_percent && 'inner' == $elements_style ) { ?>
							<div class="yte-skill-bar-percent"><?php echo esc_attr( $percent ); ?>&#37;</div>
						<?php } ?>
						<?php if ( 'true' == $show_stripe ) { ?>
							<div class="yte-skill-bar-stripe"></div>
						<?php } ?>
					</div><!-- .yte-skillbar -->

				<?php if ( 'outside' == $elements_style ) { ?>
					</div>
				<?php } ?>

			<?php } ?>

		</div><!-- .yte-skillbar -->

	<?php
	}

	protected function _content_template() { ?>
		<#
			var wrap_classes = 'yte-skillbar clr';

			if ( 'false' == settings.box_shadow ) {
				wrap_classes += ' disable-box-shadow';
			}
			if ( '' !== settings.style ) {
				wrap_classes += ' style-' + settings.style;
			}
			if ( 'inner' == settings.style ) {
				wrap_classes += ' yte-skillbar-container';
			}
		#>

		<div class="{{ wrap_classes }}" data-percent="{{ settings.percent.size }}&#37;">

			<# if ( 'inner' == settings.style ) { #>

				<div class="yte-skillbar-title">

					<div class="yte-skillbar-title-inner">
						{{{ settings.title }}}
					</div><!-- .yte-skillbar-title-inner -->

				</div><!-- .yte-skillbar-title -->

			<# } else if ( 'outside' == settings.style ) { #>

				<div class="yte-skillbar-title">
					{{{ settings.title }}}
				</div><!-- .yte-skillbar-title-inner -->

				<# if ( 'true' == settings.display_percent ) { #>
					<div class="yte-skill-bar-percent">{{ settings.percent.size }}&#37;</div>
				<# } #>

				<div style="clear:both"></div>

			<# } #>

			<# if ( settings.percent ) { #>

				<# if ( 'outside' == settings.style ) { #>
					<div class="yte-skillbar-container clr">
				<# } #>

					<div class="yte-skillbar-bar">
						<# if ( 'true' == settings.display_percent && 'inner' == settings.style ) { #>
							<div class="yte-skill-bar-percent">{{ settings.percent.size }}&#37;</div>
						<# } #>
						<# if ( 'true' == settings.display_stripe ) { #>
							<div class="yte-skill-bar-stripe"></div>
						<# } #>
					</div><!-- .yte-skillbar -->

				<# if ( 'outside' == settings.style ) { #>
					</div>
				<# } #>

			<# } #>

		</div><!-- .yte-skillbar -->
	<?php
	}

}
