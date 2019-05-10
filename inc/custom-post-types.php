<?php
if (!function_exists('dance_create_post_types')) :
    function dance_create_post_types()
    {
        register_post_type(
            'dance_lesson',
            array('labels' => array(
                'name' => __('Lessons'),
                'singular_name' => __('Lesson')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('genres')
            // tags
            // 'taxonomies' => array('catgory', 'post_tag')

        )
        );
    }
endif;
add_action('init', 'dance_create_post_types');