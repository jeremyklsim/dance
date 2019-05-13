<?php
function create_page($title) {
    
    $new_page_title = $title;
            // $new_page_content = 'This is the page content';
            $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
          
            //don't change the code bellow, unless you know what you're doing
            $page_check = get_page_by_title($new_page_title);
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                // 'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
            );
            if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
            }
}



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
        
        // create pages
        if (isset($_GET['activated']) && is_admin()){
           
            $pages = array(
                    array('title' => 'HOme'),
                    array('title' => 'Instructors'),
                    array('title' => 'Classes'),
                    array('title' => 'About'),
                    array('title' => 'Contact')

                );
                foreach($pages as $page){
                    create_page($page['title']);
                }
                

            }
        }
    
endif;
add_action('after_setup_theme', 'dance_setup');