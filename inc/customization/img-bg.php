<?php

$wp_customize->add_section(
    'tcx_advanced_options',
    array(
        'title'     => 'Hero-Images',
        'priority'  => 201
    )
);

$wp_customize->add_setting(
    'tcx_background_image',
    array(
        'default'      => '',
        'transport'    => 'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'tcx_background_image',
        array(
            'label'    => 'Home Page Header',
            'settings' => 'tcx_background_image',
            'section'  => 'tcx_advanced_options'
        )
    )
);