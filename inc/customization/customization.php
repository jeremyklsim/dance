<?php

function dance_customize_register($wp_customize){

    require_once get_template_directory() . '/inc/customization/contact.php';
    require_once get_template_directory() . '/inc/customization/img-bg.php';

}   

add_action('customize_register', 'dance_customize_register');

