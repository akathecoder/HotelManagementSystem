<?php

/**
 * Mantrabrain_Theme_Helper_Typo Fonts
 */

class Mantrabrain_Theme_Helper_Typo
{

    /**
     * Get fonts to generate.
     *
     * @since 1.0.0
     * @var array $fonts
     */
    static private $fonts = array();

    /**
     * Adds data to the $fonts array for a font to be rendered.
     *
     * @since 1.0.0
     * @param string $name The name key of the font to add.
     * @param array $variants An array of weight variants.
     * @return void
     */
    static public function add_font($name, $variants = array())
    {

        if ('inherit' == $name) {
            return;
        }
        if (!is_array($variants)) {
            // For multiple variant selectons for fonts.
            $variants = explode(',', str_replace('italic', 'i', $variants));
        }

        if (is_array($variants)) {
            $key = array_search('inherit', $variants);
            if (false !== $key) {

                unset($variants[$key]);

                if (!in_array(400, $variants)) {
                    $variants[] = 400;
                }
            }
        } elseif ('inherit' == $variants) {
            $variants = 400;
        }

        if (isset(self::$fonts[$name])) {
            foreach ((array)$variants as $variant) {
                if (!in_array($variant, self::$fonts[$name]['variants'])) {
                    self::$fonts[$name]['variants'][] = $variant;
                }
            }
        } else {
            self::$fonts[$name] = array(
                'variants' => (array)$variants,
            );
        }
    }

    /**
     * Get Fonts
     */
    static public function get_fonts()
    {

        do_action('yatri_get_fonts');

        return apply_filters('yatri_add_fonts', self::$fonts);
    }

    /**
     * Renders the <link> tag for all fonts in the $fonts array.
     *
     * @since 1.0.0
     * @since 1.0.0
     * @return void
     */
    static public function render_fonts()
    {

        $font_list = apply_filters('yatri_render_fonts', self::get_fonts());


        $google_fonts = array();

        $font_subset = array();

        $system_fonts = Mantrabrain_Theme_Helper::get_normal_fonts();

        foreach ($font_list as $name => $font) {
            if (!empty($name) && !isset($system_fonts[$name])) {

                // Add font variants.
                $google_fonts[$name] = $font['variants'];

                // Add Subset.
                $subset = apply_filters('yatri_font_subset', '', $name);
                if (!empty($subset)) {
                    $font_subset[] = $subset;
                }
            }
        }

        $google_font_url = self::google_fonts_url($google_fonts, $font_subset);
        
        if (!empty($google_fonts)) {
            wp_enqueue_style('yatri-google-fonts', $google_font_url, array(), YATRI_THEME_VERSION, 'all');
        }
    }

    static public function get_prop($array, $prop, $default = null)
    {

        if (!is_array($array) && !(is_object($array) && $array instanceof ArrayAccess)) {
            return $default;
        }

        if (isset($array[$prop])) {
            $value = $array[$prop];
        } else {
            $value = '';
        }

        return empty($value) && null !== $default ? $default : $value;
    }

    /**
     * Google Font URL
     * Combine multiple google font in one URL
     *
     * @link https://shellcreeper.com/?p=1476
     * @param array $fonts Google Fonts array.
     * @param array $subsets Font's Subsets array.
     *
     * @return string
     */
    static public function google_fonts_url($fonts, $subsets = array())
    {

        /* URL */
        $base_url = '//fonts.googleapis.com/css';
        $font_args = array();
        $family = array();

        $fonts = apply_filters('yatri_google_fonts', $fonts);

        /* Format Each Font Family in Array */
        foreach ($fonts as $font_name => $font_weight) {
            $font_name = str_replace(' ', '+', $font_name);
            if (!empty($font_weight)) {
                if (is_array($font_weight)) {
                    $font_weight = implode(',', $font_weight);
                }
                $font_family = explode(',', $font_name);
                $font_family = str_replace("'", '', self::get_prop($font_family, 0));
                $family[] = trim($font_family . ':' . urlencode(trim($font_weight)));
            } else {
                $family[] = trim($font_name);
            }
        }

        /* Only return URL if font family defined. */
        if (!empty($family)) {

            /* Make Font Family a String */
            $family = implode('|', $family);

            /* Add font family in args */
            $font_args['family'] = $family;

            /* Add font subsets in args */
            if (!empty($subsets)) {

                /* format subsets to string */
                if (is_array($subsets)) {
                    $subsets = implode(',', $subsets);
                }

                $font_args['subset'] = urlencode(trim($subsets));
            }
            return add_query_arg($font_args, $base_url);
        }

        return '';
    }
}
