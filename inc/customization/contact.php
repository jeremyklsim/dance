<?php

    $wp_customize->add_section('dance_contact', array(
        'title' => __('Contact'),
        'priority' => 30,

    ));

    $wp_customize->add_setting('dance_contact_blurb', array(
        'capability' => 'edit_theme_options',
        'default' => __('We\'d love to hear from you')
    ));

    $wp_customize->add_control('dance_contact_blurb_control', array(
        'type' => 'textarea',
        'section' => 'dance_contact',
        'settings' => 'dance_contact_blurb',
        'label' => __('Blurb')
    ));

