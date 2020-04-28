<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'CosmosWP_WP_Customize_Section_H3' )):
	class CosmosWP_WP_Customize_Section_H3 extends WP_Customize_Section {

		public $section;
		public $type = 'cosmoswp_section_h3';

		protected function render_template() {
			?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section cosmoswp-section-separator cannot-expand control-section-{{ data.type }}">
                <h3 class="accordion-section-title accordion-section-h3" tabindex="0">
                    {{ data.title }}
                </h3>
            </li>
			<?php
		}

	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'CosmosWP_WP_Customize_Section_P' )):
	class CosmosWP_WP_Customize_Section_P extends WP_Customize_Section {

		public $section;
		public $type = 'cosmoswp_section_p';

		protected function render_template() {
			?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section cosmoswp-section-separator cannot-expand control-section-{{ data.type }}">
                <p class="accordion-section-title accordion-section-p" tabindex="0">
                    {{ data.title }}
                </p>
            </li>
			<?php
		}
	}
endif;