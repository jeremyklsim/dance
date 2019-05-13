<?php

if (!function_exists('dance_enqueue_scripts')) :
    function dance_enqueue_scripts()
    {
        //enqueue styles
        wp_enqueue_style('dance-style', get_stylesheet_uri());
        wp_enqueue_style('dance-nav-style', get_template_directory_uri() . '/assets/css/nav.css');

        //enqueue scripts
        wp_enqueue_script('dance-main', get_template_directory_uri() . '/assets/js/main.js');

         // responsive nav css import
    wp_enqueue_style('dance-style-responsive-nav', get_template_directory_uri() . '/assets/css/responsive-nav.css');

    // responsive nav js import
    wp_enqueue_script('dance-script-responsive-nav', get_template_directory_uri() .'/assets/js/responsive-nav.js');
    }
endif;
add_action('wp_enqueue_scripts', 'dance_enqueue_scripts');