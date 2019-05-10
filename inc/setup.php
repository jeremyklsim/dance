<?php
/**
 * Dance theme functions and definitions
 */
$myvar = array('hi');
if (!function_exists('dance_setup')) :
    function dance_setup()
    {
        /******* 
         * add theme support
         *******/

        //featured image
        add_theme_support('post-thumbnails');

        //custom logo
        add_theme_support('custom-logo', array(
            'height'      => 150,
            'width'       => 150
        ));

        //register menus
        register_nav_menus(array(
            'primary-menu' => __('Primary'),
            'footer-menu' => __('Footer'),
            'social-menu' => __('Social')
        ));

        //set the permalink structure
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure( '/%postname%/' );
    }
endif;
add_action('after_setup_theme', 'dance_setup');