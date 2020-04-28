<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Cosmoswp_Addons_Base')) {

    /**
     * Base Class For CosmosWP for common functions
     * @package CosmosWP
     * @since 1.2.0
     *
     */
    class Cosmoswp_Addons_Base{

        /**
         * Add a new action to the collection to be registered with WordPress.
         *
         * @since    1.0.0
         * @param    string               $hook             The name of the WordPress action that is being registered.
         * @param    object               $component        A reference to the instance of the object on which the action is defined.
         * @param    string               $callback         The name of the function definition on the $component.
         * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
         * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
         */
        public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {

            add_action($hook, array( $component, $callback ), $priority, $accepted_args );
        }

        /**
         * Add a new filter to the collection to be registered with WordPress.
         *
         * @since    1.0.0
         * @param    string               $hook             The name of the WordPress filter that is being registered.
         * @param    object               $component        A reference to the instance of the object on which the filter is defined.
         * @param    string               $callback         The name of the function definition on the $component.
         * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
         * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
         */
        public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
            add_filter($hook, array( $component, $callback ), $priority, $accepted_args );
        }
    }
}