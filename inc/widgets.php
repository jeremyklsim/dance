<?php

if (!function_exists('dance_widgets_init')) :
    function dance_widgets_init()
    {
        // global $myvar;
        // var_dump($myvar);
        // die();
        register_sidebar(array(
            'name'          => __( 'Sidebar', 'theme_text_domain' ),
            'id'            => 'sidebar-1',
            'description'   => 'Add widgets here'
        ));
    }
endif;
add_action('widgets_init', 'dance_widgets_init');