<?php
if (!class_exists('Mantrabrain_Theme_Breadcrumbs')) {

    class Mantrabrain_Theme_Breadcrumbs
    {
        private static $instance = false;

        public static function get_instance()
        {

            if (!isset(self::$instance)) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function breadcrumb_trail($args = array())
        {
            if(!class_exists('Breadcrumb_Trail')) {
                include_once "class-breadcrumb-trail.php";
            }

            $breadcrumb = apply_filters('mantrabrain_theme_breadcrumb_trail_object', null, $args);

            if (!is_object($breadcrumb))

                $breadcrumb = new Breadcrumb_Trail($args);

            return $breadcrumb->trail();
        }

    }
}